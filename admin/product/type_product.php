<link rel="stylesheet" type="text/css" href="../css/form_type_product.css">
<dl class="left-nav ready">
    <dt><div>Category</div></dt>
    <dd>
        <ul>
            <li>Subcategory</li>
            <li>Subcategory</li>
            <li>Subcategory</li>
        </ul>
    </dd>
    <dt><div>Category</div></dt>
    <dd>
        <ul>
            <li>Subcategory</li>
            <li>Subcategory</li>
            <li>Subcategory</li>
        </ul>
    </dd>
    <dt><div>Category</div></dt>
    <dd>
        <ul>
            <li>Subcategory</li>
            <li>Subcategory</li>
            <li>Subcategory</li>
        </ul>
    </dd>
</dl>
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>


<script>
    $('dt').on('click', function() {
        $('dl').children('dt').removeClass('active');
        $(this).addClass('active');
    })
</script>