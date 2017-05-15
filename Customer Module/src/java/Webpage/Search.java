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
public class Search extends HttpServlet {
    private static String sp_email;
    private static String date;
    private static String time;
    private static String search;
    private static String ho;
    
    public Search(){
        
    }
    
    public static String getData(){
        return sp_email + " " + date + " " + time + " " + search + " " + ho;
    }
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
        search = request.getParameter("search");
        date = request.getParameter("date");
        time = request.getParameter("time");
        
        try {
            PrintWriter out = response.getWriter();
            InputStream is = getClass().getResourceAsStream("search.txt");
            BufferedReader br = new BufferedReader(new InputStreamReader(is));
            
            for(int i=0; i<57;i++){
                out.println(br.readLine());
            }
            
                Class.forName("com.mysql.jdbc.Driver");
                String connUrl = "jdbc:mysql://localhost:3306/webtek?user=root&password=";
                Connection conn = DriverManager.getConnection(connUrl);
                PreparedStatement ps;
                ResultSet rs;
                
                String query_hoid = "SELECT hoid FROM home_owner WHERE email='" + session_email + "'";
                ps = conn.prepareStatement(query_hoid);
                rs = ps.executeQuery();
                
                while(rs.next()){
                    ho = rs.getString(1);
                }

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
 
            for(int i=58; i<120;i++){
                out.println(br.readLine());
            }
            
                String query2 = "SELECT CONCAT(first_name, ' ', last_name), servtype, email FROM service_provider JOIN sp_service USING(spid) JOIN services USING(servid) WHERE first_name LIKE '%" + search +"%' OR last_name LIKE '%" + search +"%' OR servtype LIKE '%" + search +"%'";//incomplete
                ps = conn.prepareStatement(query2);
                rs = ps.executeQuery();
                
                if(rs.first() && !search.equals("")){
                    out.println("<div class=\"list-group\">");
                    do{
                        out.println("<li class=\"list-group-item\">\n" +
                                "<i class=\"fa fa-check\"></i>" +  rs.getString(1) + " | <i style=\"text-align:center\">" + rs.getString(3) + "</i> | <i class=\"fa fa-arrow-circle-right\"></i><i style=\"text-align:center\" name='service'> " + rs.getString(2) + "</i>\n" +
                                "<button type=\"button\" class=\"btn btn-info\" style=\"float:right;padding:1px;margin:0;font-size:14px\">View SP Profile</button>\n" +
                                "<button type=\"button\" class=\"btn btn-success\" style=\"float:right;padding:1px;margin:0 4px 0 0;font-size:14px\" data-toggle='modal' data-target='#popup'>Request</button>");
                        
                        sp_email = rs.getString(3);
                    }while(rs.next());
                    out.println("<div class=\"modal fade\" id=\"popup\" role=\"dialog\">\n" +
                                "<div class=\"modal-dialog\">\n" +
                                "<!-- Modal content-->\n" +
                                "<div class=\"modal-content\">\n" +
                                "<div class=\"modal-header\">\n" +
                                "<button class=\"close\" type=\"button\" data-dismiss=\"modal\">×</button>\n" +
                                "<h4 class=\"modal-title\">Send a request</h4>\n" +
                                "</div>\n" +
                                "<div class=\"modal-body\">\n" +
                                "<div class=\"form-group\">\n" +
                                "<label for=\"dateToBe\">Date to be rendered</label>\n" +
                                "<input class=\"form-control\" id=\"dateToBe\" type=\"text\" placeholder='2017-01-01' name='date'/>\n" +
                                "<label for='timeToBe'>Time to be rendered</label>" +
				"<input class='form-control' id='timeToBe' type='text' placeholder='10:30 am' name='time'/>" +
                                "</div>\n" +
                                "</div>\n" +
                                "<div class=\"modal-footer\">\n" +
                                "<a href='Request'><button class=\"btn btn-success\" type=\"button\">Send Request</button></a>\n" +
                                "<button class=\"btn btn-danger\" type=\"button\" data-dismiss=\"modal\">Close</button>\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "</div>"+
                                "</li>\n" +
                                "</div>");
                }else{
                    out.println("<p>No results found.</p>");
                }
            
            for(int i=121; i<176;i++){
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
