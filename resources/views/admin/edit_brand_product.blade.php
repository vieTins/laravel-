@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                @foreach($edit_brand_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-brand-product/' . $edit_value->brand_id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{ $edit_value->brand_name }}" name="brand_product_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" value="{{ $edit_value->brand_slug }}" name="brand_product_slug" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1">{{ $edit_value->brand_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    @if($edit_value->brand_status == 1)
                                        <option selected value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    @else
                                        <option value="1">Hiển thị</option>
                                        <option selected value="0">Ẩn</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection