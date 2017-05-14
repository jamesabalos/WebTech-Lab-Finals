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
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Windows10
 */
@WebServlet(name = "Dashboard", urlPatterns = {"/Dashboard"})
public class Dashboard extends HttpServlet {

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
        String session_email = "";
        try {
            PrintWriter out = response.getWriter();
            InputStream is = getClass().getResourceAsStream("dashboard.txt");
            BufferedReader br = new BufferedReader(new InputStreamReader(is));
            
            for(int i=0; i<60;i++){
                out.println(br.readLine());
            }
            
                Class.forName("com.mysql.jdbc.Driver");
                String connUrl = "jdbc:mysql://localhost:3306/webtek?user=root&password=";
                Connection conn = DriverManager.getConnection(connUrl);
                PreparedStatement ps;
                ResultSet rs;

                String query1 = "SELECT company_name, reqstatus FROM request JOIN service_provider USING(spid) JOIN home_owner USING(hoid) WHERE reqstatus IN('Accepted', 'Rejected') AND home_owner.email ='" + session_email + "' ORDER BY reqdate";//incomplete
                ps = conn.prepareStatement(query1);
                rs = ps.executeQuery();

                if(rs.first()){
                    do{
                        if(rs.getString(2).equalsIgnoreCase("accepted")){
                            out.println("<li><a href='#'>" + rs.getString(1) + "<span class='label label-success'>Accepted</span></a></li>");
                        }else{
                            out.println("<li><a href='#'>" + rs.getString(1) + "<span class='label label-danger'>Rejected</span></a></li>");
                        }
                    }while(rs.next());
                }else{
                    out.println("<li><a href='#'>No notification.</a></li>");
                }
            
            
            out.println("</ul>\n"
                        + "</li>\n"
                        + "<li class=\"dropdown\">\n"
                        + "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i>get data from session<b class=\"caret\"></b></a>");
 
            for(int i=61; i<128;i++){
                out.println(br.readLine());
            }
            
                String query2 = "SELECT company_name, date_rendered, time_rendered FROM service_provider JOIN request USING(spid) JOIN booking USING(reqid) JOIN home_owner USING(hoid) WHERE date_rendered IS NOT NULL AND home_owner.email ='" + session_email + "'";//incomplete
                ps = conn.prepareStatement(query2);
                rs = ps.executeQuery();
                
                if(rs.first()){
                    do{
                        out.println("<a href=\"\" class=\"list-group-item\">\n" +
                                    "<span class=\"badge\">"+ rs.getString(2) + " " + rs.getString(3) +"</span>\n" +
                                    "<i class=\"fa fa-fw fa-calendar\"></i>" + rs.getString(1) + "\n" +
                                    "</a>");
                        
                    }while(rs.next());
                }else{
                    out.println("<div class='text-left'><p>No history found.</p></div>");
                }
            
            for(int i=129; i<139;i++){
                out.println(br.readLine());
            }   
            
                String query3 = "SELECT company_name, date_rendered, time_rendered FROM service_provider JOIN request USING(spid) JOIN booking USING(reqid) JOIN home_owner USING(hoid) WHERE date_rendered IS NOT NULL AND home_owner.email ='" + session_email + "'";//incomplete
                ps = conn.prepareStatement(query2);
                rs = ps.executeQuery();
                
                if(rs.first()){
                    do{
                        out.println("<a href=\"\" class=\"list-group-item\">\n" +
                                    "<span class=\"badge\">"+ rs.getString(2) + " " + rs.getString(3) +"</span>\n" +
                                    "<i class=\"fa fa-fw fa-calendar\"></i>" + rs.getString(1) + "\n" +
                                    "</a>");
                        
                    }while(rs.next());
                }else{
                    out.println("<div class='text-left'><p>No history found.</p></div>");
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
