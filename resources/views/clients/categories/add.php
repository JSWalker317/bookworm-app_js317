<h1>Thêm chuyên mục</h1>
<form method="post" action="<?php echo route('categories.add');?>">
    <div>
        <input type="text" name="category_name" placeholder="Tên chuyên mục">
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
    <button type="submit" name="Thêm chuyên mục">Thêm</button>
</form>