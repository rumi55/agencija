      </div>
    </div>
    <button type="button" class="scrollup js-scrollup"></button>
    <!-- end of block .scrollup-->
    <!-- BEGIN SCRIPTS and INCLUDES-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places,drawing,geometry&key=AIzaSyCtbT1FdIsJ_UinW8edcUki4v4bkTZ71HQ"></script>
    <script type="text/javascript" src="http://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <!--
    Contains vendor libraries (Bootstrap3, Jquery, Chosen, etc) already compiled into a single file, with
    versions that are verified to work with our theme. Normally, you should not edit that file.
    -->
    <!-- build:jsvendor-->
    <script type="text/javascript" src="/<?=$tempurl?>assets/js/vendor.js"></script>
    <!-- endbuild-->
    <!--
    This file is used for demonstration purposes and contains example property items, that are mostly used to
    render markers on the map. You can safely delete this file, after you've adapted the demo.js code
    to use your own data.
    -->
    <!-- build:jsdemodata-->
    <script type="text/javascript" src="/<?=$tempurl?>assets/js/demodata.js"></script>
    <!-- endbuild-->
    <!--
    The library code that Realtyspace theme relies on, in order to function properly.
    Normally, you should not edit this file or add your own code there.
    -->
    <!-- build:jsapp-->
    <script type="text/javascript" src="/<?=$tempurl?>assets/js/app.js"></script>
    <!-- endbuild-->
    <!--
    the main file, that you should modify. It contains lots of examples of
    plugin usage, with detailed comments about specific sections of the code.
    -->
    <!-- build:jsdemo-->
    <script type="text/javascript" src="/<?=$tempurl?>assets/js/demo.js"></script>
    <script type="text/javascript" src="/<?=$tempurl?>assets/js/custom.js"></script>
    <!-- endbuild--><!-- inject:ga  -->
    <!-- endinject -->
    <!-- END SCRIPTS and INCLUDES-->

    <script src="/<?=$tempurl?>assets/js/rrssb.min.js"></script>
    <script src="/<?=$tempurl?>assets/js/owl.carousel.min.js"></script>

    <script src="/<?=$tempurl?>assets/js/blueimp-gallery.min.js"></script>
<!-- 
    <script src="/<?=$tempurl?>assets/js/featherlight.js" type="text/javascript" charset="utf-8"></script>
    <script src="/<?=$tempurl?>assets/js/featherlight.gallery.js" type="text/javascript" charset="utf-8"></script> -->

        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38500514-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  </body>
</html>