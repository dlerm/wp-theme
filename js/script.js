!function(t,o){var n=o(".contact-form"),r=o("[scroll-trigger]"),e=function(){n.on("submit",function(t){t.preventDefault();var n=o(this),r=o.ajax({url:n.attr("action"),data:n.serialize(),method:n.attr("method")});r.fail(function(t){alert("Error",t),console.log(t)}),r.done(function(t){n.prepend('<p class="mint contact-form-success">Thanks for submitting your message!</p>'),n.trigger("reset")})}),r.on("click",function(){var t=o(this).attr("scroll-trigger"),n=o('[scroll="'+t+'"]');o("html, body").animate({scrollTop:n.offset().top},500)})};t.init=function(t){e()}}(window.HomePage=window.HomePage||{},jQuery);
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIkhvbWVQYWdlLmpzIl0sIm5hbWVzIjpbIkhvbWVQYWdlIiwiJCIsIiRjb250YWN0Rm9ybSIsIiRzY3JvbGxUcmlnZ2VycyIsImJpbmRVSUFjdGlvbnMiLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsIiRmb3JtIiwidGhpcyIsImZvcm1TdWJtaXRSZXF1ZXN0IiwiYWpheCIsInVybCIsImF0dHIiLCJkYXRhIiwic2VyaWFsaXplIiwibWV0aG9kIiwiZmFpbCIsImVyciIsImFsZXJ0IiwiY29uc29sZSIsImxvZyIsImRvbmUiLCJwcmVwZW5kIiwidHJpZ2dlciIsInNjcm9sbFRvQXR0ciIsIiRzY3JvbGxUbyIsImFuaW1hdGUiLCJzY3JvbGxUb3AiLCJvZmZzZXQiLCJ0b3AiLCJpbml0IiwicHJvZHVjdCIsIndpbmRvdyIsImpRdWVyeSJdLCJtYXBwaW5ncyI6IkNBQUEsU0FBQUEsRUFBQUMsR0FFQSxHQUFBQyxHQUFBRCxFQUFBLGlCQUNBRSxFQUFBRixFQUFBLG9CQUVBRyxFQUFBLFdBRUFGLEVBQUFHLEdBQUEsU0FBQSxTQUFBQyxHQUNBQSxFQUFBQyxnQkFDQSxJQUFBQyxHQUFBUCxFQUFBUSxNQUNBQyxFQUFBVCxFQUFBVSxNQUNBQyxJQUFBSixFQUFBSyxLQUFBLFVBQ0FDLEtBQUFOLEVBQUFPLFlBQ0FDLE9BQUFSLEVBQUFLLEtBQUEsV0FHQUgsR0FBQU8sS0FBQSxTQUFBQyxHQUNBQyxNQUFBLFFBQUFELEdBQ0FFLFFBQUFDLElBQUFILEtBR0FSLEVBQUFZLEtBQUEsU0FBQVIsR0FDQU4sRUFBQWUsUUFBQSxnRkFDQWYsRUFBQWdCLFFBQUEsYUFJQXJCLEVBQUFFLEdBQUEsUUFBQSxXQUNBLEdBQUFvQixHQUFBeEIsRUFBQVEsTUFBQUksS0FBQSxrQkFDQWEsRUFBQXpCLEVBQUEsWUFBQXdCLEVBQUEsS0FDQXhCLEdBQUEsY0FBQTBCLFNBQUFDLFVBQUFGLEVBQUFHLFNBQUFDLEtBQUEsT0FJQTlCLEdBQUErQixLQUFBLFNBQUFDLEdBQ0E1QixNQUdBNkIsT0FBQWpDLFNBQUFpQyxPQUFBakMsYUFBQWtDIiwiZmlsZSI6InNjcmlwdC5qcyIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbiAoSG9tZVBhZ2UsICQpIHtcbiAgXG4gIHZhciAkY29udGFjdEZvcm0gPSAkKCcuY29udGFjdC1mb3JtJyk7XG4gIHZhciAkc2Nyb2xsVHJpZ2dlcnMgPSAkKCdbc2Nyb2xsLXRyaWdnZXJdJyk7XG5cbiAgdmFyIGJpbmRVSUFjdGlvbnMgPSBmdW5jdGlvbiAoKSB7XG4gICAgXG4gICAgJGNvbnRhY3RGb3JtLm9uKCdzdWJtaXQnLCBmdW5jdGlvbihlKSB7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICB2YXIgJGZvcm0gPSAkKHRoaXMpO1xuICAgICAgdmFyIGZvcm1TdWJtaXRSZXF1ZXN0ID0gJC5hamF4KHtcbiAgICAgICAgdXJsOiAkZm9ybS5hdHRyKCdhY3Rpb24nKSxcbiAgICAgICAgZGF0YTogJGZvcm0uc2VyaWFsaXplKCksXG4gICAgICAgIG1ldGhvZDogJGZvcm0uYXR0cignbWV0aG9kJylcbiAgICAgIH0pO1xuXG4gICAgICBmb3JtU3VibWl0UmVxdWVzdC5mYWlsKGZ1bmN0aW9uKGVycikge1xuICAgICAgICBhbGVydCgnRXJyb3InLCBlcnIpO1xuICAgICAgICBjb25zb2xlLmxvZyhlcnIpO1xuICAgICAgfSk7XG4gICAgICBcbiAgICAgIGZvcm1TdWJtaXRSZXF1ZXN0LmRvbmUoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAkZm9ybS5wcmVwZW5kKCc8cCBjbGFzcz1cIm1pbnQgY29udGFjdC1mb3JtLXN1Y2Nlc3NcIj5UaGFua3MgZm9yIHN1Ym1pdHRpbmcgeW91ciBtZXNzYWdlITwvcD4nKTtcbiAgICAgICAgJGZvcm0udHJpZ2dlcigncmVzZXQnKTtcbiAgICAgIH0pO1xuICAgIH0pO1xuXG4gICAgJHNjcm9sbFRyaWdnZXJzLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgdmFyIHNjcm9sbFRvQXR0ciA9ICQodGhpcykuYXR0cignc2Nyb2xsLXRyaWdnZXInKTtcbiAgICAgIHZhciAkc2Nyb2xsVG8gPSAkKCdbc2Nyb2xsPVwiJytzY3JvbGxUb0F0dHIrJ1wiXScpO1xuICAgICAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoeyBzY3JvbGxUb3A6ICRzY3JvbGxUby5vZmZzZXQoKS50b3AgfSwgNTAwKTtcbiAgICB9KTtcbiAgfTtcblxuICBIb21lUGFnZS5pbml0ID0gZnVuY3Rpb24gKHByb2R1Y3QpIHtcbiAgICBiaW5kVUlBY3Rpb25zKCk7XG4gIH07XG5cbn0pKHdpbmRvdy5Ib21lUGFnZSA9IHdpbmRvdy5Ib21lUGFnZSB8fCB7fSwgalF1ZXJ5KTtcbiJdfQ==
