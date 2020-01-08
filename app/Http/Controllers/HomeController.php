<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryProduct\CategoryProductRepository;
use App\Repositories\Page\PageRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Recommends\RecommendsRepositoryInterface;
use App\Repositories\ItemsAttributes\ItemAttributesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $product_repository;
    private $product_category_repository;
    private $recommends_repository;
    private $itemsAtt_repository;
    private $page;

    public function __construct(PageRepositoryInterface $p ,ProductRepositoryInterface $pro, CategoryProductRepository $cat, RecommendsRepositoryInterface $re, ItemAttributesRepositoryInterface $items)
    {
        $this->product_repository = $pro;
        $this->product_category_repository = $cat;
        $this->recommends_repository = $re;
        $this->itemsAtt_repository = $items;
        $this->page = $p;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $newProduct = $this->product_repository->getNewProduct(4);
            $categorysProduct = $this->product_category_repository->getAll();
            return view('front.shop', compact('newProduct', 'categorysProduct'));

        }
        catch (\Exception $e)
        {
            //return view('front.shop');
        }
    }

    public function productDetail($name, $id)
    {
        try{
            $product = $this->product_repository->getDetail($id);
            $items_attributes_name = $this->itemsAtt_repository->getItemsAttByName('Size');
            if (isset($product))
            {
                if (Auth::check()){
                    $user_id = Auth::user()->id;
                    $pro_id = $product->id;

                    // wishlist
                    $checkProductWishList = $this->product_repository->checkProductWishList($user_id,$pro_id);

                    //recommands
                    $isCheckRecommend = $this->recommends_repository->checkRecommend($user_id,$pro_id);
                    if (!$isCheckRecommend){
                        $this->recommends_repository->addRecommend($user_id,$product->id);
                    }
                    $getRecommends = $this->recommends_repository->getProducts(3);
                    return view('front.product_detail', compact('product','checkProductWishList','getRecommends','items_attributes_name'));
                }else{
                    return view('front.product_detail', compact('product','items_attributes_name'));
                }
            }
            else
            {
                return view('front.404');
            }
        }
        catch (\Exception $e)
        {
            //$errors = $e->getMessage();
            return view('front.404');

        }

    }

    public  function  contact()
    {
        return view('front.contact');
    }

    public function about()
    {
        $about = $this->page->getPage('About');
        return view('front.about', compact('about'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToWishList(Request $request)
    {
        try{
            $user_id = Auth::user()->id;
            $pro_id = $request->pro_id;

            $checkProductWishList = $this->product_repository->checkProductWishList($user_id,$pro_id);

            // if not have product wishlist add
            if (!$checkProductWishList) {
                $isAddWishList = $this->product_repository->addWishList($user_id, $pro_id);
                if ($isAddWishList) {
                    return redirect()->back()->with('suc','You succesfully add a product to wishlist.');
                }
            }
        }
        catch (Exception $exception){
        }
    }

    public function viewWishList()
    {
        $user_id= Auth::user()->id;
        $products = $this->product_repository->viewWishList($user_id);
        return view('front.wishList',compact('products'));
    }

    public function destroyWishlist($id)
    {
        $user_id= Auth::user()->id;
        $isDelete = $this->product_repository->removeWishlist($user_id, $id);
        if ($isDelete){

            return redirect()->back()->with('suc','You succesfully Deleted a product.');
        }else{
            return redirect()->back()->with('err','You not Deleted a product.');
        }
    }
}
