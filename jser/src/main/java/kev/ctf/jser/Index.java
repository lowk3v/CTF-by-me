package kev.ctf.jser;

import com.alibaba.fastjson.JSON;

import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Arrays;
import java.util.Base64;

import javax.servlet.annotation.WebServlet;

/**
 * Created by IntelliJ IDEA
 *
 * @Author: kev
 * @Date: 10:38 19/04/2019
 * @Version: 1.0
 */
@WebServlet("/home")
public class Index extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        Cookie[] cookies = request.getCookies();
        String token = null;
        if (cookies == null){
            request.getRequestDispatcher("/home.html").forward(request, response);
            return;
        }
        for (Cookie cookie : cookies) {
            if (cookie.getName().equals("token")){
                token = cookie.getValue();
                break;
            }
        }
        if (token == null){
            request.getRequestDispatcher("/home.html").forward(request, response);
        }else{
            request.getRequestDispatcher("/user").forward(request, response);
        }
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String username = req.getParameter("username");
        String fullname = req.getParameter("fullname");
        if (! (username.matches("[a-z0-9]+") && fullname.matches("[a-z0-9]+"))){
            resp.sendError(403, "Input invalid");
        }
        UserModel u = new UserModel();
        u.setUsername(username);
        u.setFullname(fullname);
        String token = JSON.toJSONString(u);
        Cookie new_cookie = new Cookie("token", Base64.getEncoder().encodeToString(token.getBytes("UTF-8")));
        resp.addCookie(new_cookie);
        resp.sendRedirect("/user");
    }

}
