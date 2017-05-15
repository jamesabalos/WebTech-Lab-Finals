/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Webpage;

import java.io.IOException;
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
public class Request extends HttpServlet {

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
        String spid = "";
        String data = Search.getData();
        String[] data2 = data.split(" ");
        String date = request.getParameter("date");
        String time = request.getParameter("time");
        
        try (PrintWriter out = response.getWriter()) {
            
            if(!data2[0].equals("null") && !data2[1].equals("null") && !data2[2].equals("null")){
                Class.forName("com.mysql.jdbc.Driver");
                String connUrl = "jdbc:mysql://localhost:3306/webtek?user=root&password=";
                Connection conn = DriverManager.getConnection(connUrl);
                PreparedStatement ps;
                ResultSet rs;

                String query = "SELECT spid FROM service_provider WHERE email='" + data2[0] + "'";
                ps = conn.prepareStatement(query);
                rs = ps.executeQuery();

                while(rs.next()){
                    spid = rs.getString(1);
                }

                String insert = "Insert INTO request(startdate, start_time, hoid, spid,  )";


                out.println("<script>alert('Request sent.');"
                          + "location.href='Dashboard';</script>");
            }else{
                out.println("<script>alert('Fill out all information needed. " + data2[0] + data2[1] + data2[2] + "');"
                          + "location.href='Search?search=" + data2[3] + "';</script>");
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
