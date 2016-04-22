<?php

  require_once($_SERVER["DOCUMENT_ROOT"] . "/data/permissions_dispatcher.php");
  $widgets = array("widget1", "widget2", "widget3");
  $user_id = 812;

  $visible_flags = getVisibilityFlags($widgets, $user_id);
  $js_visible_flags = json_encode($visible_flags['permissions']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Proof of Concept</title>
  <link rel="stylesheet" href="/css/poc.css" type="text/css"/>
  <script type="text/javascript" src="/js/jquery-1.11.1.min.js" language="JavaScript"></script>

  <script type="text/javascript">

    function setVisibleWidgets() {
      var a_visible_flags = {};
      a_visible_flags = <?=$js_visible_flags?>;

      for (var widget in a_visible_flags) {
        if (a_visible_flags.hasOwnProperty(widget) && a_visible_flags[widget] == "visible") {
          $("#" + widget).show();
        } else {
          $("#" + widget).hide();
        }
      }
    }

    $(document).ready(function () {
      setVisibleWidgets();
    });

  </script>
</head>
<body>

  <div>
    <?=$js_visible_flags?>
  </div>

  <section id="widget1">
    <span>This is widget 1, which is obviously displaying a little bit of text.</span>
  </section>

  <section id="widget2">
    <span>This is widget 2, which is obviously displaying a little bit of text.</span>
  </section>

  <section id="widget3">
    <span>This is widget 3, which is obviously displaying a little bit of text.</span>
  </section>

</body>
</html>