/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Webpage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Windows10
 */
public class Profile extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        String session_email = " ";
        String home_owner = "";
        try {
            PrintWriter out = response.getWriter();
            InputStream is = getClass().getResourceAsStream("profile.txt");
            BufferedReader br = new BufferedReader(new InputStreamReader(is));
            
            for(int i=0; i<57;i++){
                out.println(br.readLine());
            }
            
                Class.forName("com.mysql.jdbc.Driver");
                String connUrl = "jdbc:mysql://localhost:3306/webtek?user=root&password=";
                Connection conn = DriverManager.getConnection(connUrl);
                PreparedStatement ps;
                ResultSet rs;

                String query1 = "SELECT CONCAT(service_provider.first_name, ' ', service_provider.last_name), reqdate, req_time, reqstatus FROM request JOIN service_provider USING(spid) JOIN home_owner USING(hoid) WHERE reqstatus IN('Accepted', 'Rejected') AND home_owner.email ='" + session_email + "' ORDER BY reqdate";//incomplete
                ps = conn.prepareStatement(query1);
                rs = ps.executeQuery();

                if(rs.first()){
                    do{
                        if(rs.getString(4).equalsIgnoreCase("Accepted")){
                            out.println("<li><a href='#'>" + rs.getString(1) + "<span class='label label-success' style='float:right'>Accepted</span><p style='font-size:11px'>" + rs.getString(2) + " " + rs.getString(3) + "</p></a></li>");
                        }else{
                            out.println("<li><a href='#'>" + rs.getString(1) + "<span class='label label-danger'>Rejected</span><p>" + rs.getString(2) + " " + rs.getString(3) + "</p></a></li>");
                        }
                    }while(rs.next());
                }else{
                    out.println("<li><a href='#'>No notification.</a></li>");
                }
            
                String query_name = "SELECT CONCAT(first_name, ' ', last_name) FROM home_owner WHERE home_owner.email ='" + session_email + "'";//incomplete
                ps = conn.prepareStatement(query_name);
                rs = ps.executeQuery();
                
                while(rs.next()){
                    home_owner = rs.getString(1);
                }
            out.println("</ul>\n"
                        + "</li>\n"
                        + "<li class=\"dropdown\">\n"
                        + "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i>" + home_owner + "<b class=\"caret\"></b></a>");
 
            for(int i=58; i<119;i++){
                out.println(br.readLine());
            }
            
                String query2 = "SELECT CONCAT(first_name, ' ', last_name) FROM home_owner WHERE home_owner.email ='" + session_email + "'";//incomplete
                ps = conn.prepareStatement(query2);
                rs = ps.executeQuery();
                
                while(rs.next()){
                    out.println("<h2>" + rs.getString(1) + "</h2>");
                }
            
            for(int i=120; i<123;i++){
                out.println(br.readLine());
            }   
            
                String query3 = "SELECT cp_no, email, address FROM home_owner WHERE home_owner.email ='" + session_email + "'";//incomplete
                ps = conn.prepareStatement(query3);
                rs = ps.executeQuery();
                
                while(rs.next()){
                    out.println("<p><span class=\"glyphicon glyphicon-earphone one\" style=\"width:50px;\"></span>" + rs.getString(1) + "</p>\n" +
                                "<p><span class=\"glyphicon glyphicon-envelope one\" style=\"width:50px;\"></span>" + rs.getString(2) + "</p>\n" +
                                "<p><span class=\"glyphicon glyphicon-map-marker one\" style=\"width:50px;\"></span>" + rs.getString(3) + "</p>");
                }
            
            for(int i=124; i<175;i++){
                out.println(br.readLine());
            } 
            
        }catch(Exception e){
            
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
