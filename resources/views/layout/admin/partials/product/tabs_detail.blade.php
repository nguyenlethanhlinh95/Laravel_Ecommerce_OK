<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/6/2020
 * Time: 10:35 AM
 */
?>
<div class="col-xs-12">
    <div class="wapper_tab">
        <div class="row">
            <div class="col-xs-3"> <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left sideways">
                    <li class="active"><a href="#general-v" data-toggle="tab">General</a></li>
                    <li><a href="#inventory-v" data-toggle="tab">Inventory</a></li>
                    <li><a href="#attributes-v" data-toggle="tab">Attributes</a></li>
                    {{--<li><a href="#settings-v" data-toggle="tab">Settings</a></li>--}}
                </ul>
            </div>

            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="general-v">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Regular price (₫)</label>
                            <div class="col-sm-9">
                                <input value="{{ $pro->pro_price }}" class="form-control" name="pro_price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Sale price (₫)</label>
                            <div class="col-sm-9">
                                <input value="{{ $pro->spl_price }}" class="form-control" name="spl_price">
                                <span class="description">
                                    <a id="#" class="schedule">Schedule</a>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row hide" id="sales_price">
                            <label for="sale_price" class="col-sm-3 col-form-label">Sale price dates</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control-plaintext" id="sale_price" placeholder="From… YYYY-MM-DD">
                                <a href="#" class="cancle">Cancel</a>
                            </div>

                            <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 mgt-10" style="margin-top: 10px !important;">
                                <input type="date" class="form-control-plaintext mgt-10" id="b" placeholder="To… YYYY-MM-DD">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="inventory-v">
                        <div class="form-group">
                            <label>Product Stock</label>
                            <input value="{{ $pro->stock }}" class="form-control" name="stock" placeholder="Prodcut stock">
                        </div>

                        <div class="form-group">
                            <label>Product code</label>
                            <input value="{{ $pro->pro_code }}" class="form-control" name="pro_code" placeholder="Prodcut code">
                        </div>
                    </div>
                    <div class="tab-pane" id="attributes-v">
                        {{--create page--}}
                        @if (!empty($sizes))
                            <div class="wap_att">
                                <h5>Size</h5>
                                @foreach($sizes as $size)
                                    <div class="form-check form-check-inline">
                                        <input
                                                @if (!empty($sizes_product))
                                                    @foreach($sizes_product as $s)
                                                            @if ($size->id == $s)
                                                                {{ 'checked' }}
                                                            @endif
                                                    @endforeach
                                                @endif
                                                name="size[]" class="form-check-input" type="checkbox" id="size-{{$size->name}}" value="{{ $size->id }}">
                                        <label class="form-check-label" for="size-{{ $size->name }}">{{ $size->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    {{--<div class="tab-pane" id="settings-v">Settings Tab.</div>--}}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>



