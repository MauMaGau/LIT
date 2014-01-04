var Base = angular.module('Base', []);



// Use square brackets [[]] instead of curley braces {{}}
Base.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
});

Base.filter('orderObjectBy', function() {
  return function(items, field, reverse) {
    var filtered = [];
    angular.forEach(items, function(item) {
      filtered.push(item);
    });
    filtered.sort(function (a, b) {
      return (a[field] > b[field]);
    });
    if(reverse) filtered.reverse();
    return filtered;
  };
});
