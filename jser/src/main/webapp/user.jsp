<html>
<body>
<h2>Hello JAVA World!</h2>
<% if (request.getAttribute("username") == null && request.getAttribute("fullname")==null){%>
<p><i>No things !!!</i></p>
<%}else{%>
<p><b>Hi, ${username}(${fullname})</b></p>
<%}%>
</body>
</html>
