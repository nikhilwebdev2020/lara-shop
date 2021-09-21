@extends('theme.layouts.main')

@section('content')

@include('theme.sections.inner.page-banner')

@include('theme.sections.inner.breadcrumb-alt')

<section class="product-detail fixed-width cart-detail mb-5">
    <div class="flex no-align">

        <div class="cart-wrapper alt">

            <div class="table-responsive">

                <table class="table has-border">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <label class="font-dark">
                                    <span><span class="bold">Shipped By:</span> Maxine Blooms</span>
                                </label>
                            </td>
                            <td colspan="2" class="font-12 text-right">
                                Estimated Time 3 Sep
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <img src="https://picsum.photos/90/90" alt="">
                            </td>
                            <td class="va-top about-product">
                                <h4><a href="" class="font-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod.</a></h4>
                                <span class="font-light font-12">Lorem ipsum dolor sit amet</span>
                            </td>
                            <td class="va-top product-rate text-center">
                                <div class="block">$45.00</div>
                                <div class="icons">
                                    <a href="#" class="font-light"><i class="far fa-heart"></i></a>
                                    <a href="#" class="font-light"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </td>
                            <td class="va-top product-qty text-center">
                                <span class="order-count">
                                    <span class="font-light">Qty: </span>
                                    <span>1</span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table has-border">
                    <tr>
                        <td colspan="2">
                            <label class="font-dark">
                                <span><span class="bold">Shipped By:</span> Maxine Blooms</span>
                            </label>
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="https://picsum.photos/90/90" alt="">
                        </td>
                        <td class="va-top about-product">
                            <h4><a href="" class="font-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod.</a></h4>
                            <span class="font-light font-12">Lorem ipsum dolor sit amet</span>
                        </td>
                        <td class="va-top product-rate text-center" width="140px">
                            <div class="block">$50.00</div>
                            <div class="icons">
                                <a href="#" class="font-light"><i class="far fa-heart"></i></a>
                                <a href="#" class="font-light"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                        <td class="va-top product-qty text-center" width="140px">
                            <span class="order-count">
                                <span class="font-light">Qty: </span>
                                <span>1</span>
                            </span>
                        </td>
                    </tr>
                </table>

            </div>

        </div>
        <div class="shipping-details-wrapper alt">

            @include('theme.sections.product.shipping-details')

        </div>
    </div>
</section>

@endsection