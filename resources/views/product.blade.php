@extends('layouts.layout')

@section('title')
{{'محصولات'}}
@endsection

@section('content')

<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{url('index')}}" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{url('category')}}" itemprop="url"><span itemprop="title">الکترونیکی</span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{url('product')}}" itemprop="url"><span itemprop="title">لپ تاپ ایلین ور</span></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <div itemscope itemtype="http://schema.org/محصولات">
            <h1 class="title" itemprop="name">{{$product->product_name}}</h1>
            <br/><br/>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="{{asset('storage/products/'.$product->images->first()->image_name)}}" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" data-zoom-image="image/product/macbook_air_1-500x500.jpg" /> </div>
                {{-- <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div> --}}
                {{-- <div class="image-additional" id="gallery_01"> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_1-500x500.jpg" data-image="image/product/macbook_air_1-350x350.jpg" title="لپ تاپ ایلین ور"> <img src="image/product/macbook_air_1-66x66.jpg" title="لپ تاپ ایلین ور" alt = "لپ تاپ ایلین ور"/></a> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_4-500x500.jpg" data-image="image/product/macbook_air_4-350x350.jpg" title="لپ تاپ ایلین ور"><img src="image/product/macbook_air_4-66x66.jpg" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" /></a> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_2-500x500.jpg" data-image="image/product/macbook_air_2-350x350.jpg" title="لپ تاپ ایلین ور"><img src="image/product/macbook_air_2-66x66.jpg" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" /></a> <a class="thumbnail" href="#" data-zoom-image="image/product/macbook_air_3-500x500.jpg" data-image="image/product/macbook_air_3-350x350.jpg" title="لپ تاپ ایلین ور"><img src="image/product/macbook_air_3-66x66.jpg" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" /></a> </div> --}}
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>برند :</b> <a href="#"><span itemprop="brand">اپل</span></a></li>
                  <li><b>کد محصول :</b> <span itemprop="mpn">{{$product->product_code}}</span></li>
                  <li><b>امتیازات خرید:</b> 700</li>
                  <li><b>وضعیت موجودی :</b> <span class="instock">{{$product->product_count}}</span></li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span>{{$product->product_price}} تومان </span></li>
                  {{-- <li></li>
                  <li>بدون مالیات : 9 میلیون تومان</li> --}}
                </ul>
                <div id="product">
                  <h3 class="subtitle">انتخاب های در دسترس</h3>
                  <div class="form-group required">
                    <label class="control-label">رنگ</label>
                    <select class="form-control" id="input-option200" name="option[200]">
                      <option value=""> --- لطفا انتخاب کنید --- </option>
                      <option value="4">مشکی </option>
                      <option value="3">نقره ای </option>
                      <option value="1">سبز </option>
                      <option value="2">آبی </option>
                    </select>
                  </div>
                  <div class="cart">
                    <div>
                      <div class="qty">
                        <label class="control-label" for="input-quantity">تعداد</label>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>
                      <button type="button" id="button-cart" class="btn btn-primary btn-lg">افزودن به سبد</button>
                    </div>
                    <div>
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> افزودن به علاقه مندی ها</button>
                      <br />
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> مقایسه این محصول</button>
                    </div>
                  </div>
                </div>
                <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0" />
                  <p><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href=""><span itemprop="reviewCount">1 بررسی</span></a> / <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک بررسی بنویسید</a></p>
                </div>
                <hr>
                <!-- Displaying related tags BEGIN -->
                <p>
                    @foreach($product->tags  as  $tag)

                      <a href="{{route('tag.products', $tag->id)}}">{{$tag->tag_name}}</a>
                      {{$loop->last ? '' : ','}}

                    @endforeach
                </p>
                <!-- Displaying related tags END -->
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
              <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
              <li><a href="#tab-review" data-toggle="tab">بررسی (2)</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <p><b>پردازشگر اینتل core i7</b></p>
                  <p>مک بوک جدید با پردازشگر اینتل core i7 از همیشه سریعتر ظاهر شده و آماده است که گوی سبقت را از رقبا بگیرد.</p>
                  <p><b>16 گیگابایت رم و هارد دیسک های بزرگتر</b></p>
                  <p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                  <p><b>طراحی خارق العاده و بی نظیر</b></p>
                  <p>مک بوک در واقع ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                  <p><b>با دوربین i-Sight درون ساخت</b></p>
                  <p>بدون نیاز به ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                </div>
              </div>
              <div id="tab-specification" class="tab-pane">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td colspan="2"><strong>حافظه</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>تست 1</td>
                      <td>8gb</td>
                    </tr>
                  </tbody>
                  </table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                      <td colspan="2"><strong>پردازشگر</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>تعداد هسته</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div id="tab-review" class="tab-pane">
                <form class="form-horizontal">
                  <div id="review">
                    <div>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>هاروی</span></strong></td>
                            <td class="text-right"><span>1395/1/20</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>اندرسون</span></strong></td>
                            <td class="text-right"><span>1395/1/20</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right"></div>
                  </div>
                  <h2>یک بررسی بنویسید</h2>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-name" class="control-label">نام شما</label>
                      <input type="text" class="form-control" id="input-name" value="" name="name">
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-review" class="control-label">بررسی شما</label>
                      <textarea class="form-control" id="input-review" rows="5" name="text"></textarea>
                      <div class="help-block"><span class="text-danger">توجه :</span> HTML بازگردانی نخواهد شد!</div>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label">رتبه</label>
                      &nbsp;&nbsp;&nbsp; بد&nbsp;
                      <input type="radio" value="1" name="rating">
                      &nbsp;
                      <input type="radio" value="2" name="rating">
                      &nbsp;
                      <input type="radio" value="3" name="rating">
                      &nbsp;
                      <input type="radio" value="4" name="rating">
                      &nbsp;
                      <input type="radio" value="5" name="rating">
                      &nbsp;خوب</div>
                  </div>
                  <div class="buttons">
                    <div class="pull-right">
                      <button class="btn btn-primary" id="button-review" type="button">ادامه</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
        <!--Middle Part End -->

      </div>
    </div>
  </div>

@endsection
