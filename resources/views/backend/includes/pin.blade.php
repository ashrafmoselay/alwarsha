<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/backend/css/bootstrap.min.css') }}" media="screen">
</head>
<body>
<img src="{{asset('easypin/condition.jpg')}}" width="800"  class="pin" easypin-id="jizLvySUzI">
 <!-- dialog window -->
 <div class="easy-modal" role="dialog" style="display:none;" modal-position="free">
    <form style="direction: rtl;">
        <div class="form-group">
            <label>ما هى المشكلة؟</label>
            <input type="text" class="form-control" name="content" placeholder="وصف المشكلة" />
        </div>
        <button type="button" class="btn btn-primary easy-submit">حفظ</button>
    </form>
</div>
<div id="points" class="form-group">

</div>
<!-- popover -->
<div style="display:none;" width="130" shadow="true" popover="">
    <div style="width:100%;text-align:center;">{[content]}</div>
</div>


<script src="{{asset('easypin')}}/jquery-2.2.0.min.js"></script>
<script src="{{asset('easypin')}}/jquery.easing.min.js"></script>
<script src="{{asset('easypin')}}/jquery.easypin.js"></script>
<script type="text/javascript">
    var cord = getQueryParam("cord");
    var name = getQueryParam("name");

    if(cord && name){

        @php
            $pointsList = [
                ["content"=>"point1","coords"=>["lat"=>"479","long"=>"77"]],
                ["content"=>"point#2","coords"=>["lat"=>"543","long"=>"184"]]
            ];
            $cordinates = $pointsList;
        @endphp
        let cord = @json($cordinates);
        var myString = "";
        cord.forEach((v,k) => {
            myString += '"'+k+'":'+JSON.stringify(v);
            if(cord.length != k+1){
                myString+= ",";
            }
        });
        var $instance = $('.pin').easypin({
            init: '{"jizLvySUzI":{'+myString+',"canvas":{"src":"{{asset('easypin/condition.jpg')}}","width":"950","height":"562"}}}',
            //limit:1,
            drop: function(x, y, element) {
                var markerIndex = element.attr('data-index');
                addCordDataForm(markerIndex,x,y);
            },
            drag: function(x, y, element) {
                var markerIndex = element.attr('data-index');
                addCordDataForm(markerIndex,x,y);
            }
        });
    }else{
        var $instance = $('.pin').easypin({
            //init: '{"jizLvySUzI":{'+myString+',"canvas":{"src":"{{asset('easypin/condition.jpg')}}","width":"950","height":"562"}}}',
            //limit:1,
            drop: function(x, y, element) {
                var markerIndex = element.attr('data-index');
                addCordDataForm(markerIndex,x,y);
            },
            drag: function(x, y, element) {
                var markerIndex = element.attr('data-index');
                addCordDataForm(markerIndex,x,y);
            }
        });
    }
    function getQueryParam(param) {
        var result =  window.location.search.match(
            new RegExp("(\\?|&)" + param + "(\\[\\])?=([^&]*)")
        );

        return result ? result[3] : false;
    }
    function addCordDataForm(markerIndex,x,y){
        var container = $("#points").find(".row-"+markerIndex);
        if(container.length){
            container.find(".x").val(x);
            container.find(".y").val(y);
        }else{
            $("#points").append('<div class="row-'+markerIndex+'"> <input class="pinname form-control" type="text" value="" name="cord['+markerIndex+'][name]"/> <input class="x form-control" type="text" value="'+x+'" name="cord['+markerIndex+'][x]"/> <input class="y form-control" type="text" value="'+y+'" name="cord['+markerIndex+'][y]"/> </div>');
        }
    }
</script>
</body>
</html>
