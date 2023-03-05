<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

<style>
    .select {
        width: 100%;
    }
</style>

<select name="test" id="test" class="select">
    <option value="abcd">abcd</option>
    <option value="qwer">qwer</option>
    <option value="asdf">asdf</option>
    <option value="zxcv">zxcv</option>
    <option value="gjkl">gjkl</option>
</select>

<script>
    jQuery(document).ready(function(){
        jQuery('.select').select2();
    });
</script>