<?php
namespace App\Helper;
class Cart{
    public $items=[];
    public $total_quantity=0;
    public $total_price=0;
    
    public function __construct(){
        $this->items =session('cart')? session('cart'):[];
        $this->total_price=$this->getTotalPrice();
        $this->total_quantity=$this->getTotalQuantity();
    }
    //lay ve danh sach gio hang
    public function list()  {
        return $this->items;
    }

    //them vao gio
    public function add($product,$quantity=1) {
        $item =[
            'product_id'=>$product->id,
            'price'=>$product->sale_price > 0  ? $product->sale_price : $product->price,
            'image'=>$product->image,
            'quantity'=>$quantity,
            'name'=>$product->name
        ];
        if(isset($this->items[$product->id])){
            $this->items[$product->id]['quantity']+=$quantity;
        }else{
            $this->items[$product->id] = $item;
        }
       
        session(['cart'=>$this->items]);
    }
    //lay tong tien
    public function getTotalPrice() {
        $totalPrice=0;
        foreach ($this->items as $item) {
            $totalPrice+= $item['price']*$item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity() {
        $total=0;
        foreach ($this->items as $item) {
            $total+= $item['quantity'];
        }
        return $total;
    }
    //xoa 1 san pham khoi gio
    public function remove($id)  {
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart'=>$this->items]);
    }
    //cap nhat
    public function update($id,$quantity=1)  {
        if(isset($this->items[$id])){
            if($quantity==0){
                unset($this->items[$id]);
            }else{
                $this->items[$id]['quantity'] =$quantity;  
            }
                 
        }
        
        session(['cart'=>$this->items]);
    }
    //xoa het
    public function clear()  {
        session(['cart'=>'']);
    }
}