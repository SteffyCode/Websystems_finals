@extends("layouts.base");
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">
    <style>
        nav svg{
            height: 20px;
        }
        .product-box .product-details h5 {            
            width: 100%;	
        }
    </style>
@endpush

@section("content")
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Shop</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 category-side col-md-4">
                <div class="category-option">
                    <div class="button-close mb-3">
                        <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                    </div>
                    <div class="accordion category-name" id="accordionExample">
                        <div class="accordion-item category-rating">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    Brand
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body category-scroll">
                                    <ul class="category-list">
                                        @foreach ($brands as $brand)
                                        <li>
                                            <div class="form-check ps-0 custome-form-check">
                                                <input class="checkbox_animated check-it" id="br{{$brand->id}}" name="brands" @if(in_array($brand->id,explode(',',$q_brands))) checked="checked" @endif  value="{{$brand->id}}" type="checkbox" onchange="filterProductsByBrand(this)">
                                                <label class="form-check-label">{{$brand->name}}</label>
                                                 <p class="font-light">({{$brand->products->count()}})</p>
                                            </div>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>

                        

                        <div class="accordion-item category-rating">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix">
                                    Category
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne">
                                <div class="accordion-body category-scroll">
                                    <ul class="category-list">
                                        @foreach ($categories as $category)
                                            <li>
                                         <div class="form-check ps-0 custome-form-check">
                                    <input class="checkbox_animated check-it" id="ct{{$category->id}}" name="categories" type="checkbox" @if(in_array($category->id,explode(',',$q_categories))) checked="checked" @endif  value="{{$category->id}}" onchange="filterProductsByCategory(this)">
                                 <label class="form-check-label">{{$category->name}}</label>
                            <p class="font-light">({{$category->products->count()}})</p>
                             </div>
                                </li>
                                    @endforeach

                                       
                                        {{-- <li>
                                            <div class="form-check ps-0 custome-form-check">
                                                <input class="checkbox_animated check-it" id="ct5" name="categories"
                                                    type="checkbox" value="5">
                                                <label class="form-check-label">Dolores Et</label>
                                                <p class="font-light">(4)</p>
                                            </div>
                                        </li> --}}

                                        {{-- <li>
                                            <div class="form-check ps-0 custome-form-check">
                                                <input class="checkbox_animated check-it" id="ct6" name="categories"
                                                    type="checkbox" value="6">
                                                <label class="form-check-label">Quis Repudiandae</label>
                                                <p class="font-light">(0)</p>
                                            </div>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven">
                                    Discount Range
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse show"
                                aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="category-list">
                                        <li>
                                            <div class="form-check ps-0 custome-form-check">
                                                <input class="checkbox_animated check-it" type="checkbox"
                                                    id="flexCheckDefault19">
                                                <label class="form-check-label" for="flexCheckDefault19">5% and
                                                    above</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check ps-0 custome-form-check">
                                                <input class="checkbox_animated check-it" type="checkbox"
                                                    id="flexCheckDefault20">
                                                <label class="form-check-label" for="flexCheckDefault20">10% and
                                                    above</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check ps-0 custome-form-check">
                                                <input class="checkbox_animated check-it" type="checkbox"
                                                    id="flexCheckDefault21">
                                                <label class="form-check-label" for="flexCheckDefault21">20% and
                                                    above</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="category-product col-lg-9 col-12 ratio_30">

                <div class="row g-4">
                    <!-- label and featured section -->
                    <div class="col-md-12">
                        <ul class="short-name">


                        </ul>
                    </div>

                    <div class="col-12">
                        <div class="filter-options">
                            <div class="select-options">
                                <div class="page-view-filter">
                                    <div class="dropdown select-featured">
                                        <select class="form-select" name="orderby" id="orderby">
                                            <option value="-1" {{ $order==-1? 'selected':''}}>Default</option>
                                            <option value="1" {{ $order==1? 'selected':''}}>Date, New To Old</option>
                                            <option value="2" {{ $order==2? 'selected':''}}>Date, Old To New</option>
                                            <option value="3" {{ $order==3? 'selected':''}}>Price, Low To High</option>
                                            <option value="4" {{ $order==4? 'selected':''}}>Price, High To Low</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="dropdown select-featured">
                                    <select class="form-select" name="size" id="pagesize">
                                          <option value="12" {{ $size == 12 ? 'selected':'' }}>12 Products Per Page</option>
                                          <option value="24" {{ $size == 24 ? 'selected':'' }}>24 Products Per Page</option>
                                          <option value="52" {{ $size == 52 ? 'selected':'' }}>52 Products Per Page</option>
                                          <option value="100" {{ $size == 100 ? 'selected':'' }}>100 Products Per Page</option>
                                    </select>
                              </div>
                              
                            </div>
                            <div class="grid-options d-sm-inline-block d-none">
                                <ul class="d-flex">
                                    <li class="two-grid">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="three-grid d-md-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/grid-3.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn active d-lg-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/grid.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/list.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- label and featured section -->

                <!-- Prodcut setion -->
                <div
                    class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
                    @foreach ($products as $product)

                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                        <img src="assets/images/fashion/product/front/{{$product->image}}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                        <img src="assets/images/fashion/product/back/{{$product->image}}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="cart-wrap">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)" class="addtocart-btn">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{$product->category->name}}</span>
                                    <ul class="rating mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-price">
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="font-default">
                                        <h5 class="ms-0">{{$product->name}}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">{{$product->category->name}}</span>
                                        <p class="font-light">{{$product->short_description}}</p>
                                    </div>
                                    <h3 class="theme-color">₱{{$product->regular_price}}</h3>
                                    <button class="btn listing-content">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                
                </div>
                {{$products->links("pagination.default")}}
                {{-- <nav class="page-section">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Previous"
                                style="color:#6c757d;">
                                <span aria-hidden="true">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            </a>
                        </li>


                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="shop-1.html?page=2">2</a>
                        </li>

                        <li class="page-item">
                            <a href="shop-1.html?page=2" class="page-link" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                        </li>

                    </ul>
                </nav> --}}

            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->
<!-- Subscribe Section Start -->
<section class="subscribe-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="subscribe-details">
                    <h2 class="mb-3">Subscribe Our News</h2>
                    <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our fresh
                        and fantastic Products.</h6>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                <div class="subsribe-input">
                    <div class="input-group">
                        <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                        <button class="btn btn-solid-default" type="button">Button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Subscribe Section End -->

<form id="frmFilter" method="GET">
    <input type="hidden" name="page" id="page" value="{{$page}}" />
    <input type="hidden" name="size" id="size" value="{{$size}}" /> 
    <input type="hidden" name="order" id="order"  value="{{$order}}" />  
    <input type="hidden"  name="brands" id="brands" value="{{$q_brands}}" />
    <input type="hidden"  name="categories" id="categories" value="{{$q_categories}}" />
</form>
@endsection


@push('scripts')
      <script>
            $("#pagesize").on("change",function(){                    
                  $("#size").val($("#pagesize option:selected").val());
                  $("#frmFilter").submit(); 
            });
            
            $("#orderby").on("change",function(){                    
                    $("#order").val($("#orderby option:selected").val());
                    $("#frmFilter").submit(); 
             });
             function filterProductsByBrand(brand){
                var brands = "";
                $("input[name='brands']:checked").each(function(){
                    if(brands=="")
                    {
                        brands += this.value;
                    }
                    else{
                        brands += "," + this.value;
                    }
                });
                $("#brands").val(brands);
                $("#frmFilter").submit();
            } 

            function filterProductsByCategory(brand){
                var categories = "";
                $("input[name='categories']:checked").each(function(){
                    if(categories=="")
                    {
                        categories += this.value;
                    }
                    else{
                        categories += "," + this.value;
                    }
                });
                $("#categories").val(categories); // Changed from brands to categories
                $("#frmFilter").submit();
            } 

      </script>
@endpush
