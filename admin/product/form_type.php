<?php
?>
<link rel="stylesheet" href="./css/form_type_product.css">

<!-- 
  quick test on adding an element to a list, then sorting said list 
  nothing all that special.
-->
<div class="category">
  <h3>Cats</h3>
  <div class="subcategory">
    <span class="subcat">Lion <span>Sửa</span><span>Xóa</span></span><br />
    <span class="subcat">Tiger <span>Sửa</span><span>Xóa</span></span><br />
    <span class="subcat">Tabby <span>Sửa</span><span>Xóa</span></span><br />
  </div>
    <a href="javascript:;" class="addsubcat">Add Subcategory</a>
</div>
<!-- <hr style="border:0;background:#ccc;height:3px;" /> -->
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

<script>
    // plugin
    jQuery.fn.sortElements = (function(){    
        var sort = [].sort;
        return function(comparator, getSortable) {
            getSortable = getSortable || function(){return this;};
            var placements = this.map(function(){
                var sortElement = getSortable.call(this),
                    parentNode = sortElement.parentNode,
                    nextSibling = parentNode.insertBefore(
                        document.createTextNode(''),
                        sortElement.nextSibling
                    );
                return function() {
                    if (parentNode === this) {
                        throw new Error(
                            "You can't sort elements if any one is a descendant of another."
                        );
                    }
                    parentNode.insertBefore(this, nextSibling);
                    parentNode.removeChild(nextSibling);
                };
            });
            return sort.call(this, comparator).each(function(i){
                placements[i].call(getSortable.call(this));
            });
        };
    })();

function createAdd() {
  var $form = '';
    
        $form =         '<span class="ssAddSubCat">';
        $form = $form + '<input type="text" name="newsubcat" class="newsubcat" placeholder="Enter Entry Name Here" />';
        $form = $form + '<br />';
        $form = $form + '<button name="add" class="add">Add</button>';
        $form = $form + '<button name="canceladd" class="canceladd">Cancel</button>';
        $form = $form + '</span>';
    $('.subcategory').append($form);
    
    }

    // fires when you add an element to the list
    $('.category').on('click', '.add', function () {
    var $currentList = $('.subcategory'),
        $newElement  = $('input[type="text"].newsubcat').val();
    
    $currentList.append('<span class="subcat">' + $newElement + " <span>EDIT</span></span><br />");
    $('.ssAddSubCat').remove();

    $('.subcat').sortElements(function(a, b){
        return $(a).text() > $(b).text() ? 1 : -1;
    });
    $('.addsubcat').trigger('click');
    });

    // produces the input to add to above list
    $('.addsubcat').on('click', function () {
    createAdd();
    $('input.newsubcat').focus();
    });

    $('.category').on('click', '.canceladd', function () {
    $('.ssAddSubCat').remove();
    });

</script>