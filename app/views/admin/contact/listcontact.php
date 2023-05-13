<nav aria-label="breadcrumb" style="font-size: 30px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/login/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" >Contact List</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Contact list</h3><table class="table table-striped">
    
<thead>
      <tr>
      <th class="text-center h2">STT</th>
        <th class="text-center h2">Name</th>
        <th class="text-center h2">Email</th>
        <th class="text-center h2">Phone</th>
        <th class="text-center h2">Subject</th>
        <th class="text-center h2">Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
        foreach ($contact as $key => $cont){
            $i++;
    ?>  
      <tr>
        <td class="text-center h4"><?php echo $i ?></td>
        <td class="text-center h4"><?php echo $cont['name'] ?></td>
        <td class="text-center h4"><?php echo $cont['email'] ?></td>
        <td class="text-center h4"><?php echo $cont['phone'] ?></td>
        <td class="text-center h4"><?php echo $cont['subject'] ?></td>
        <td class="text-center"><textarea class="text-center h4" readonly="true" style="background-color: #f9f9f9;"><?php echo $cont['message'] ?></textarea></td>
       
      </tr>
      <?php
        }
         ?>
    </tbody>
