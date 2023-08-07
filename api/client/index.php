<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  $api_key = '1234567890';
  $request_data = json_decode(file_get_contents("php://input"), true);

//   var_dump($request_data);

  if(!isset($request_data['api_key'])){
   echo json_encode(
      ["message" => "You are not authorised"]
   );
   die();
  }

  if($request_data['api_key'] !== $api_key){
   echo json_encode(
      ["message" => "You api_key is not correct"]
   );
   die();
  }

  
      # Get the User Id
      $user_id = $request_data['user_id'];

      # Get the Invoice Id
      // $invoice_id = $request_data['invoice_id'];

      # Get the request type
      $request_type = $request_data['request_type'];
         
      
      switch ($request_type) {
         case "update_profile":
            // echo "this is to update the profile";
            update_profile($user_id, $request_data);
            break;
         case "new_invoice":
            // echo "this is to update the profile";
            new_invoice($user_id, $request_data);
            break;
         case "deliver_invoice":
            // echo "this is to update the profile";
            deliver_invoice($user_id, $request_data);
            break;
         case "update_invoice":
            // echo "this is to update the profile";
            update_invoice($user_id, $request_data);
            break;
         case "delete_invoice":
            // echo "this is to update the profile";
            delete_invoice($request_data);
            break;
         case "delete_withdraw":
            // echo "this is to update the profile";
            delete_withdraw($request_data);
            break;
         case "create_withdraw":
            // echo "this is to update the profile";
            create_withdraw($user_id,$request_data);
            break;
         case "deliver_withdraw":
            // echo "this is to update the profile";
            deliver_withdraw($user_id,$request_data);
            break;
         case "update_withdraw":
            // echo "this is to update the profile";
            update_withdraw($user_id,$request_data);
            break;
         case "credit_acct":
            // echo "this is to update the profile";
            credit_acct($user_id,$request_data);
            break;
      }

      #funtion to credit all account 
      function credit_acct($user_id, $request_data){

         $user_acct = $request_data['user_acct'];
         $base_acct = $request_data['base_acct'];

         file_put_contents('../../folds/'. $user_id .'_id/account.json',json_encode($user_acct));
         file_put_contents('../../folder/active/mainAccount.json',json_encode($base_acct));

         echo json_encode([
            'user_acct' => $user_acct,
            'base_acct' => $base_acct
         ]);
      }

      # Funtion to add item
      function update_profile($user_id, $request_data){
          $user_profile = json_decode(file_get_contents('../../folds/'. $user_id . '_id/user_profile.json'));

         $data = [
            'bank_info' => $request_data['bank_info'],
            'personal_info' => $request_data['personal_info']
         ];

         $data = json_encode($data);

         file_put_contents('../../folds/'. $user_id . '_id/user_profile.json', $data);

          echo json_encode(
            ['message' => 'updated was a sucess']);
          return json_encode(
            ['message' => 'updated was a sucess']);

      }

      function new_invoice($user_id, $request_data){
         // var_dump($request_data);
         $file_data = json_decode(file_get_contents('../../folds/'. $user_id . '_id/docs/credit.json', true));

         $file_data = array_merge($file_data, [$request_data]);

         $file_data = json_encode($file_data);

         file_put_contents('../../folds/'. $user_id . '_id/docs/credit.json', $file_data);

         echo json_encode(array(json_decode($file_data)));
   
      }

      function deliver_invoice($user_id, $request_data){

         $file_data = json_decode(file_get_contents('../../folder/active/payment.json', true));

         $user_data = $request_data['user_data'];
         
         $request_data = $request_data['base_data'];

         $file_data = array_merge($file_data, [$request_data]);
         
         file_put_contents('../../folder/active/payment.json', json_encode($file_data));

         file_put_contents('../../folds/'. $user_id .'_id/docs/credit.json', json_encode($user_data));

         echo json_encode([
            // 'msg' => json_decode($request_data)
            $file_data
         ]);
      }

      function update_invoice($user_id, $request_data){

         $base_data = $request_data['base_data'];

         $user_data = $request_data['user_data'];

         file_put_contents('../../folder/active/payment.json', json_encode($base_data));

         file_put_contents('../../folds/'. $user_id . '_id/docs/credit.json', json_encode($user_data));

         echo json_encode([
            'message' => 'successfully updated the invoice status'
         ]); 

      }

      function delete_invoice($request_data){

         $base_data = $request_data['base_data'];

         file_put_contents('../../folder/active/payment.json', json_encode($base_data));

         echo json_encode([
            'message' => 'successfully updated the invoice status'
         ]); 
      }


      function create_withdraw($user_id, $request_data){

         $user_data = $request_data['user_data'];

         file_put_contents('../../folds/'. $user_id .'_id/docs/debit.json', json_encode($user_data));
         
         echo json_encode($request_data);

      }

      

      function deliver_withdraw($user_id, $request_data){

         $user_data = $request_data['user_data'];

         $file_data = json_decode(file_get_contents('../../folder/active/withdraw.json', true));
         
         $combine = array_merge($file_data, [$user_data]);

         file_put_contents('../../folder/active/withdraw.json', json_encode($combine));
         
         echo json_encode($request_data);

      }

      function update_withdraw($user_id, $request_data){

         $base_data = $request_data['base_data'];

         $user_data = $request_data['user_data'];

         file_put_contents('../../folder/active/withdraw.json', json_encode($base_data));

         file_put_contents('../../folds/'. $user_id .'_id/docs/debit.json', json_encode($user_data));

         echo json_encode([
            'message' => 'successfully updated the invoice status'
         ]); 

      }

      function delete_withdraw($request_data){

         $base_data = $request_data['base_data'];

         file_put_contents('../../folder/active/withdraw.json', json_encode($base_data));

         echo json_encode([
            'message' => 'successfully Deleted the invoice status'
         ]); 
      }

      


