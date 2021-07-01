<?php


use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
use App\Models\Currency;
use Illuminate\Support\Facades\Session;

class Helper{

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    } 
    public static function getAllCategory(){
        $category=new Category();
        $menu=$category->getAllParentWithChild();
        return $menu;
    } 
    
    public static function getHeaderCategory(){
        $category = new Category();
        // dd($category);
        $menu=$category->getAllParentWithChild();

        if($menu){
            ?>
            <ul>
                <?php
                    foreach($menu as $cat_info){
                        if($cat_info->child_cat->count()>0){
                            ?>
                            <li><a href="<?php echo route('product-cat',$cat_info->slug); ?>"><?php echo $cat_info->title; ?></a>
                                <ul>
                                    <?php
                                    foreach($cat_info->child_cat as $sub_menu){
                                        ?>
                                        <li><a href="<?php echo route('product-sub-cat',[$cat_info->slug,$sub_menu->slug]); ?>"><?php echo $sub_menu->title; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                                <li><a href="<?php echo route('product-cat',$cat_info->slug);?>"><?php echo $cat_info->title; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
        <?php
        }
    }

    public static function productCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }

    public static function postTagList($option='all'){
        if($option='all'){
            return PostTag::orderBy('id','desc')->get();
        }
        return PostTag::has('posts')->orderBy('id','desc')->get();
    }

    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }
    // Cart Count
    public static function cartCount($user_id=''){
       
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    // relationship cart with product
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public static function getAllProductFromCart($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::with('product')->where('user_id',$user_id)->where('order_id',null)->get();
        }
        else{
            return 0;
        }
    }
    // Total amount cart
    public static function totalCartPrice($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }
    // Wishlist Count
    public static function wishlistCount($user_id=''){
       
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    public static function getAllProductFromWishlist($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();
        }
        else{
            return 0;
        }
    }
    public static function totalWishlistPrice($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }

    // Total price with shipping and coupon
    public static function grandPrice($id,$user_id){
        $order=Order::find($id);
        dd($id);
        if($order){
            $shipping_price=(float)$order->shipping->price;
            $order_price=self::orderPrice($id,$user_id);
            return number_format((float)($order_price+$shipping_price),2,'.','');
        }else{
            return 0;
        }
    }


    // Admin home
    public static function earningPerMonth(){
        $month_data=Order::where('status','delivered')->get();
        // return $month_data;
        $price=0;
        foreach($month_data as $data){
            $price = $data->cart_info->sum('price');
        }
        return number_format((float)($price),2,'.','');
    }

    public static function shipping(){
        return Shipping::orderBy('id','DESC')->get();
    }
    public static function showCurrencyPrice($price) {


        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }

        $price = round($price * $curr->value, 2);


        return $curr->sign.$price;


    }
    
    
    public static function showAdminCurrencyPrice($price) {
        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        $price = round($price * $curr->value,2);
        return $curr->sign.$price;
    }


      public static function storePrice($price) {
        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        $price = ($price / $curr->value);
        return $price;
    }


    public static function showCurrency()
    {
        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        return $curr->sign;
    }

    public static function showCurrencyCode()
    {
        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        return $curr->name;
    }

    public static function showCurrencyValue()
    {
        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        return $curr->value;
    }


    public static function showPrice($price) {

        if (Session::has('currId')){
            $curr = Currency::where('id', session()->get('currId'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        
        $price = $price * $curr->value;

        return round($price,2);

    }
    
}

?>