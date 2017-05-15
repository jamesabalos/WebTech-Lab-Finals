<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/sql" prefix="sql"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/functions" prefix="fn"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/fmt" prefix="fmt"%>
 
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>RenderIT</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>

    <body>
		<sql:setDataSource 
            driver="com.mysql.jdbc.Driver"
            url="jdbc:mysql://localhost:3306/webtek"
            user="root"
            password=""/>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.jsp"><img class = "logo" src = "./images/logo.png"/></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <sql:query var="results">
                                SELECT service_provider.first_name, service_provider.last_name, reqdate, req_time, reqstatus FROM request JOIN service_provider USING(spid) JOIN home_owner USING(hoid) WHERE reqstatus IN('Accepted', 'Rejected')
                            </sql:query>
                            
                            <c:choose>
                                <c:when test="${results.rowCount != 0}">
                                    <c:forEach var="sp" items="${results.rows}">
					<c:choose>
                                            <c:when test="${sp.reqstatus == 'Accepted'}">
						<li>
                                                    <a href="#">${sp.first_name} ${sp.last_name}<span class='label label-success' style='float:right'>Accepted</span><p style='font-size:11px'>${sp.reqdate} ${sp.req_time}</p></a>
						</li>
                                            </c:when>
                                            <c:otherwise>
						<c:choose>
                                                    <c:when test="${sp.reqstatus == 'Rejected'}">
							<li>
                                                            <a href="#">${sp.first_name} ${sp.last_name}<span class='label label-danger' style='float:right'>Rejected</span><p style='font-size:11px'>${sp.reqdate} ${sp.req_time}</p></a>
							</li>
                                                    </c:when>
						</c:choose>
                                            </c:otherwise>
					</c:choose>
                                    </c:forEach>
                                </c:when>
                                <c:otherwise>
                                    <li><a href='#'>No notification.</a></li>
                                </c:otherwise>
                            </c:choose>
                        </ul>
                    </li>
                    <li class="dropdown">
							<sql:query var="results">
                                SELECT CONCAT(first_name, ' ', last_name) FROM home_owner WHERE home_owner.email ='session_email'
                            </sql:query>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Randy Antero<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="Profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="search">
                            <form action="Search" class="search-form">
                                <div class="form-group has-feedback">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                </div>
                            </form>
                        </li>
                        <li>
                            <a href="./index.jsp"><i class="fa fa-fw fa-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="Dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- /.navbar-collapse -->


            <div id="page-wrapper">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <i class="fa fa-home"></i>
                                Home 
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-home"></i> Home
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="section-white">
                                <div class="container">

                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="./images/gardening.jpg" alt="...">
                                                <div class="carousel-caption">
                                                    <h2>Gardening</h2>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="./images/cleaning.jpg" alt="...">
                                                <div class="carousel-caption">
                                                    <h2>Cleaning</h2>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="./images/laundry.jpg" alt="...">
                                                <div class="carousel-caption">
                                                    <h2>Laundry</h2>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>

                                </div>
                            </section>
                            <div class="jumbotron">
                                <h1><span class="fa fa-user"></span>Welcome, Randy Antero</h1>
                                <p>RenderIt is a company that provides the best Home Services thru the Web. The process and the transactions are done online. Just Find a Service Provider that suits your Requested Home Service and we'll do the rest.</p>
                            </div>
                            <div class="jumbotron">
                                <h1><span class="fa fa-trophy"></span>Mission</h1>  
                                <p>It is our business to completely give and supply reliable services and continue to satisfy the customer.</p>

                            </div>
                            <div class="jumbotron">
                                <h1><span class="fa fa-eye"></span>Vision</h1> 
                                <p>To have a successful business, it is a must to be critical thinkers, God-fearing noble, creative and can take part on managing the business accordingly. </p>
                            </div>
                            <footer class="footer-distributed">
                                <div class="footer-left">
                                    <img class="logo" src="./images/logo.png">
                                    <p class="footer-company-name">RenderIt © 2017</p>
                                </div>

                                <div class="footer-center">
                                    <div>   
                                        <i class="fa fa-map-marker"></i>
                                        <p>Baguio, Philippines</p>
                                    </div>
                                    <div>
                                        <i class="fa fa-phone"></i>
                                        <p>+63 925 369 5283</p>
                                    </div>
                                    <div>
                                        <i class="fa fa-envelope"></i>
                                        <p><a href="mailto:support@renderit.com">support@renderit.com</a></p>
                                    </div>
                                </div>

                                <div class="footer-right">
                                    <p class="footer-company-about"><span>About RenderIt!</span>          
                                        RenderIt is a company that provides the best Home Services thru the Web. The process and the transactions are done online. Just Find a Service Provider that suits your Requested Home Service and we'll do the rest.</p>
                                </div>
                            </footer>  
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <!-- Container (About Section) -->   
    </body>

</html>
