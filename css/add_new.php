<?php include("menu.php");?>       
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="insert.php">
                    <input type="hidden" name="action" value="update" class="form-control"/><br />
                    <div class="form-group">
                        <label style="color: black" >Name or Company Name</label>
                        <input type="text" id="name" name="name" value="" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label style="color: black">Email</label>
                        <input type="text" id="email" name="email" value="" class="form-control"/>
                    </div>
                    <div>
                        <input type="checkbox" name="chkCompany[]" value="SkyICT">
                        <label for="SkyICT" style="color: black"> SkyICT </label><br>
                        <input type="checkbox" name="chkCompany[]" value="Gfin">
                        <label for="Gfin" style="color: black"> Gfin </label><br>
                        <input type="checkbox" name="chkCompany[]" value="ProInside">
                        <label for="ProInside" style="color: black"> ProInside </label><br>
                    </div>
                    <div class="form-group"  align="center">
                        <input type="submit" id="submit" value="submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>