package kev.ctf.jser;

import com.alibaba.fastjson.JSON;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.util.Base64;

/**
 * Created by IntelliJ IDEA
 *
 * @Author: kev
 * @Date: 11:19 19/04/2019
 * @Version: 1.0
 */
@WebServlet("/user")
public class User extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        Cookie[] cookies = req.getCookies();
        String token = null;
        if (cookies == null){
            req.getRequestDispatcher("/home.html").forward(req, resp);
            return;
        }
        for (Cookie cookie : cookies) {
            if (cookie.getName().equals("token")){
                token = cookie.getValue();
                break;
            }
        }
        if (token == null){
            req.getRequestDispatcher("/home.html").forward(req, resp);
            return;
        }

        UserModel u = JSON.parseObject(new String(Base64.getDecoder().decode(token)), UserModel.class);

        req.setAttribute("username", u.getUsername());
        req.setAttribute("fullname", u.getFullname());
        req.getRequestDispatcher("/user.jsp").forward(req, resp);
    }
}
