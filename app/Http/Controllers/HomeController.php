<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Message;
use App\Models\Package;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SocialMedia;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //all product
        $products=DB::table('products')->orderBy('id', 'desc')->get();
        $data['products']=array();
        foreach($products as $product){
            $image=DB::table('images')->where('product_id',$product->id)->pluck('image');
            $data['products'][]=[
                'id'=>$product->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'discount'=>$product->discount,
                'link_buy'=>$product->link_buy,
                'image'=>$image,
                'slug'=>$product->slug,
            ];
        }
        //all slider that type 1 its carousel
        $data['sliders']=Slider::where('type','1')->get();    
        //all slider that type 2 its promo
        $data['promos']=Slider::where('type','2')->get();
        $data['posts']=DB::table('posts')->select('posts.*','images.image','users.name')
                    ->leftJoin('users','users.id','posts.id_user')
                    ->leftJoin('images','images.product_id','posts.id')
                    ->get();
        $posts=Post::all();
        $data['posts']=array();
        foreach($posts as $post){
            $image=DB::table('images_article')->where('article_id',$post->id)->pluck('image')->first();
            $user=DB::table('admins')->where('id',$post->id_user)->pluck('nama')->first();
            $total_comment=DB::table('comments')->where('id_product',$post->id)->count();
            $data['posts'][]=[
                'id'=>$post->id,
                'name'=>$user,
                'image'=>$image,
                'tittle'=>$post->tittle,
                'post'=>$post->post,
                'total_comment'=>$total_comment,
                'slug' => $post->slug,
                'created_at'=>$post->created_at,
            ];
        }
        $data['posts'] = collect($data['posts'])->map(function($inner_child){
            return (Object) $inner_child;
        });
        // dd($data);
        //get all data from galleries table
        $data['galleries']=Gallery::all();

        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        // dd($data);
        return view('home.index',$data);
    }

    public function detail($slug)
    {
        //get semua menu
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        //detail product by id
        $data['products']=DB::table('products')->where('slug', $slug)->get();
        //save to table user view
        $userView=new UserView();
        $userView->product_name=$data['products'][0]->name;
        $userView->save();
        //search all image that related to id
        $data['images']=DB::table('images')->where('product_id',$data['products'][0]->id)->get();

        $data['categories']= DB::table('product_categories')->inRandomOrder()->limit(5)->get();

        $data['best_sellers']=DB::table('user_views')
        ->select('products.name','products.price','products.discount','products.id','images.image')
        ->leftJoin('products','products.name','user_views.product_name')
        ->leftJoin('images','images.product_id','products.id')
        ->groupBy('user_views.product_name','products.name','products.price','products.discount','products.id','images.image')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(5)
        ->get();
        //get all data from related categories or tags
        $data['relateds']=DB::table('products')
                ->select('products.name','products.price','products.discount','products.id','images.image','products.slug')
                ->leftJoin('images','images.product_id','products.id')->get();
        //get all comments and total comments from id product
        $data['comments']=DB::table('comments')->where('id_product',$data['products'][0]->id)->where('comment_type', '1')->where('status', '1')->get();
        $data['total_comment']=DB::table('comments')->where('id_product',$data['products'][0]->id)->where('comment_type', '1')->where('status', '1')->count();
        $data['merchants']=SocialMedia::all();
        // dd($data);
        return view('home.detail',$data);

    }

    public function postComment(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $comment=new Comment();
        $comment->comment_type="1";
        $comment->status="0";
        $comment->comment=$request->comment;
        $comment->email=$request->email;
        $comment->name=$request->name;
        $comment->id_product=$request->id;
        $comment->save();
        $checkDetailPost=DB::table('products')->where('id',$request->id)->first();
        if($checkDetailPost){
            return redirect()->route('detail', ['slug' => $request->slug]);
        }

    }

    public function blogComment(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        
        $comment=new Comment();
        $comment->comment_type="2";
        $comment->status="0";
        $comment->comment=$request->comment;
        $comment->email=$request->email;
        $comment->name=$request->name;
        $comment->id_product=$request->id;
        $comment->save();
        $checkDetailPost=DB::table('posts')->where('id',$request->id)->first();
        if($checkDetailPost){
            return redirect()->route('detail_post', ['slug' => $request->slug]);
        }

    }

    public function detailPost($slug)
    {
        //get semua menu
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        //get all data post based on id
        $data['post']=DB::table('posts')->select('posts.*','images.image','admins.nama')
                    ->leftJoin('admins','admins.id','posts.id_user')
                    ->leftJoin('images','images.product_id','posts.id')
                    ->where('slug',$slug)->first();
        //get all comments from post based on id
        $data['comments']=Comment::where('id_product',$data['post']->id)->where('comment_type', '2')->where('status', '1')->get();
        //get total comments
        $data['total_comment']=Comment::where('id_product',$data['post']->id)->where('comment_type', '2')->where('status', '1')->count();
        //select random for tags
        $data['tags']=Tag::inRandomOrder()->limit(5)->get();

        $data['images']=DB::table('images_article')->where('article_id', $data['post']->id)->first();
        //select most of viewed products limit 3
        $data['best_sellers']=DB::table('user_views')
        ->select('products.name','products.price','products.discount','products.id','images.image')
        ->leftJoin('products','products.name','user_views.product_name')
        ->leftJoin('images','images.product_id','products.id')
        ->groupBy('user_views.product_name','products.name','products.price','products.discount','products.id','images.image')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(5)
        ->get();
        //select categories, also random
        $data['categories']=Category::inRandomOrder()->limit(5)->get();
        //get other posts
        $data['other_posts'] = DB::table('posts')->select('posts.*','images.image')
                ->leftJoin('images','images.product_id','posts.id')
                ->where('posts.id', '!=', $data['post']->id)->limit(3)->get();
        // dd($data);
        return view('posts.detail',$data);
    }

    public function menu($slug)
    {
        $data['menus']=Menu::all();
        $data['menu']=Menu::where('slug',$slug)->first();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();

        $data['slug']=$slug;
        
        return view('menu.menu',$data);
    }

    public function about()
    {
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        return view('about.about',$data);
    }

    public function product()
    {
        //get all menu
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        //get best seller
        $data['best_sellers']=DB::table('user_views')
        ->select('products.name','products.price','products.discount','products.id','images.image')
        ->leftJoin('products','products.name','user_views.product_name')
        ->leftJoin('images','images.product_id','products.id')
        ->groupBy('user_views.product_name','products.name','products.price','products.discount','products.id','images.image')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(5)
        ->get();
        //get all products
        $data['products']=DB::table('products')
                ->select('products.id','products.name','products.price','products.discount','images.image','products.slug')
                ->leftJoin('images','images.product_id','products.id')->paginate(9);
        //get all data categories
        $data['categories']= DB::table('product_categories')->inRandomOrder()->limit(5)->get();
        // dd($data);
        return view('product.produk',$data);
    }

    public function productFilter(Request $request)
    {
        $data=DB::table('products')
                ->select('products.id','products.name','products.price','products.discount','images.image','products.created_at')
                ->leftJoin('images','images.product_id','products.id');
                if ($request->filter=="1") {
                    $data = $data->orderBy('products.created_at', 'DESC');
                }
                $data=$data->get();
                
        return response()->json($data);

    }

    public function agen()
    {
        //get all menu
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        $data['agents']=Agent::where('type','1')->get();
        // dd($data);
        return view('agen.agen',$data);
    }

    public function daftarAgen()
    {
        //get all menu
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['packages']=Package::all();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        return view('agen.daftar',$data);
    }

    public function postDaftarAgen(Request $request)
    {
        $agent=new Agent();
        $agent->name=$request->name;
        $agent->location=$request->city;
        $agent->email=$request->email;
        $agent->phone=$request->phone;
        $agent->package=$request->package;
        $agent->type="0";
        $agent->save();
        return redirect()->route('agen');
    }

    public function terms()
    {
        //get all menu
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        return view('agen.terms',$data);
    }

    public function whyus()
    {
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        return view('agen.whyus',$data);
    }

    public function contact()
    {
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        return view('kontak.kontak',$data);
    }

    public function postMessage(Request $request)
    {
        $message= new Message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->save();
        return redirect()->route('contact');
    }

    public function blog()
    {
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        $data['posts']=DB::table('posts')->select('posts.*','images_article.image','admins.nama')
                    ->leftJoin('admins','admins.id','posts.id_user')
                    ->leftJoin('images_article','images_article.article_id','posts.id')->paginate(6);
                    // dd($data);
        return view('blog.blog',$data);
    }

    public function blogCategories($categories)
    {
        $data['posts']=DB::table('posts')
                ->orwhere('category', 'like', '%'.$categories.'%')
                ->orwhere('tag', 'like', '%'.$categories.'%')
                ->get();
        dd($data);
    }

    public function search(Request $request)
    {
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();
        $data['products']=DB::table('products')
                ->select('products.name','products.price','products.discount','products.id','images.image', 'products.slug')
                ->leftJoin('images','images.product_id','products.id')
                ->where('name', 'like', '%'.$request->search.'%')
                ->get();
        $data['posts']=DB::table('posts')->select('posts.*','images.image','users.name')
                ->leftJoin('users','users.id','posts.id_user')
                ->leftJoin('images','images.product_id','posts.id')
                ->where('tittle', 'like', '%'.$request->search.'%')
                ->get();
        // dd($data);
        return view('home.search',$data);
    }

    public function product_category($category)
    {
        $data['menus']=Menu::all();
        $data['menutops']=Menu::where('status','1')->get();
        $data['menu_customers']=Menu::where('category','1')->get();
        $data['menu_helps']=Menu::where('category','2')->get();

        $data['best_sellers']=DB::table('user_views')
        ->select('products.name','products.price','products.discount','products.id','images.image')
        ->leftJoin('products','products.name','user_views.product_name')
        ->leftJoin('images','images.product_id','products.id')
        ->groupBy('user_views.product_name','products.name','products.price','products.discount','products.id','images.image')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(5)
        ->get();
        //get all products
        $data['products']=DB::table('products')
                ->select('products.id','products.name','products.price','products.discount','products.slug','images.image')
                ->leftJoin('images','images.product_id','products.id')
                ->where('category', 'like', '%'.$category.'%')
                ->paginate(9);
        //get all data categories
        $data['categories']= DB::table('product_categories')->inRandomOrder()->limit(5)->get();

        $data['nama_category'] = $category;

        return view('product.category', $data);
    }
    
}
