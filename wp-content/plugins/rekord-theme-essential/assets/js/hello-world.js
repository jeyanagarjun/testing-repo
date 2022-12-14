jQuery(document).ready(function($) {
  "use strict";
  lightSlider();
  alert("good");
});

(function($) {
  lightSlider();
  alert("good");
  console.log("form heelloow world widget");

  elementorFrontend.hooks.addAction("frontend/element_ready/widget", function(
    $scope
  ) {
    if ($scope.data("shake")) {
      $scope.shake();
    }
  });
  /**
   * @param $scope The Widget wrapper element as a jQuery element
   * @param $ The jQuery alias
   */

  var WidgetHelloWorldHandler = function($scope, $) {
    console.log($scope);
    alert("goo");
  };

  // Make sure you run this code under Elementor.
  $(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/hello-world.default",
      WidgetHelloWorldHandler
    );
  });
})(jQuery);
