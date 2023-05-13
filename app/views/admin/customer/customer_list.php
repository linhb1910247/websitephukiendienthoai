<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<hr>


<nav aria-label="breadcrumb" style="font-size: 30px;"></nav>
<?php
  if(!empty($_GET['msg'])){
    $msg= unserialize(urldecode($_GET['msg']));
   foreach( $msg as $key => $value ){
    echo '  <div class="">
    <h3>Notification</h>
    <div class="alert alert-success">
      <h4>'.$value.'</h4> 
    </div> ';
    }

}
  
   
?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/login/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" >Customer</li>
                    </ol>
                </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box  ">
                <div class="main-box-body ">
                    <div class="table">
                        <table class="table user-list">
                            <thead>
                                <tr style="font-size: 28px;">
                                <th class="text-center">User</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Email</th>
                               
                                <th class="text-center">Role edit</th>
                                <th class="text-center">&nbsp;Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 25px;">
                            <thead  >
                            <?php foreach ($customer as $key => $user){?>
                                <tr  > 
                                    <td class="text-center">
                                    <img   height="60" width="60" src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $user['avatar']?>" alt="avatar">
                                        <h6 style="font-size: 13px;"><?php echo $user['customers_name']?></h6>  
                                    </td>
                                    <?php

                                    ?>
                                    <td>
                                    <?php
                                    if($user['level'] == -1){?>
                                     <h5 class="text-center" class="user-subhead">Closed Account</h5>
                                    <?php 
                                    }else if($user['level'] == 2){?>
                                     <h5 class="text-center" class="user-subhead">Host</h5>
                                    <?php
                                    }else if($user['level'] == 1){?>
                                    <h5 class="text-center" class="user-subhead">Admin</h5>
                                    <?php
                                    }else if($user['level'] ==0){?>
                                      <h5 class="text-center" class="user-subhead">User</h5>
                                    <?php
                                    }
                                    ?>
                                    
                                    </td>
                                  <?php 
                                  if(Session::get('user') ||  Session::get('admin') || Session::get('host')){
                                  if(Session::get('customers_id')==$user['customers_id'] ){?>
                                    <td class="text-center">
                                    <h5   class="text-info">Active</h5  >
                                      
                                    </td>
                                    <?php
                                    }else if($user['level']==-1){ ?>
                                    <td class="text-center">
                                    <h5 class="text-danger">Lock</h5>
                                    </td>
                                     <?php
                                  }else{ ?>
                                  <td class="text-center">
                                    <h5 class="text-primary">Inactive</h5>
                                    </td>
                                  <?php
                                  }}
                                        ?>
                                   
                                    <td>
                                    <h5 class="text-center"><?php echo $user['email']?></h5 >  
                                    </td>
                                 
                                    <td>
                                   <form action="<?php echo BASE_URL ?>/customer/upload_role/<?php echo $user['customers_id']?>" method="POST">
                                   <div class=" row ">
                                   <div class="col-sm-6">
                                    <select class="btn-sm text-center" name="level">
                                        <option>User</option>
                                    
                                     <option>Admin</option>
                                     <option>Host</option>
                                     <option>Lock</option>
                                      </select>
                                    </div>
                                      <!-- <input type="text" class="btn-sm" name="level" value=""> -->
                                     <div class="col-sm ">
                                     <button  type="submit" class="btn btn-sm btn-primary"> <span class="fa-stack ">
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </button>
                                     </div>
                                   </div>
                                             </form>
                                </td>
                                    <td class="text-center">
                                    <form action="<?php echo BASE_URL ?>/customer/delete_user/<?php echo $user['customers_id']?>" method="POST">

                                        <button type="submit"  type class="btn btn-sm btn-danger">
                                        <span class="fa-stack ">
                                            
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                              </span>
                                        </button>
                                </form>
                                    </td>
                                  
                                </tr>
                                <?php } ?>
                                    </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
