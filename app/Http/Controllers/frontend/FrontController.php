<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontController extends Controller
{
    public function index(){
        $featured_products=Product::where('trending','1')->latest()->take(15)->get();
        $trending_category=Category::where('popular','1')->latest()->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_category'));
    }

    public function category(){

        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug){


        if(Category::where('slug',$slug)->exists())
        {

            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else{

            return redirect('/')->with('status','slug doesnot exists');
        }
    }

    public function productview($cate_slug,$prod_slug){

        if(Category::where('slug',$cate_slug)->exists())
        {

            if(Product::where('slug',$prod_slug)->exists())
            {

                $product=Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('product'));
            }
            else{

                return redirect('/')->with('status','the link was broken');
            }
        }
        else{

            return redirect('/')->with('status','No such category found');
        }

        
    }

    
    public function view($prod_slug)
    {

        if(Product::where('slug',$prod_slug)->exists())
            {

                $product=Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('product'));
            }
            else{

                return redirect('/')->with('status','the link was broken');
            }
        
      

        
    }

    
}
