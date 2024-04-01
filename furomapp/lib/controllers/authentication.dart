import 'package:flutter/material.dart';
import 'package:furomapp/views/home.dart';
//import 'package:furomapp/constants/constants.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:get_storage/get_storage.dart';
class AuthenticationController extends GetxController{

 final isLoading = false.obs;
 final token = ''.obs;
 final userData = {}.obs;
 final box = GetStorage();
//  Future register(
//   {
//     required String name, 
//     required String password, 
//     required String email, 
//     required String username,
//   }
//  ) async {
//    try {
//      isLoading.value = true;
//     var data = {
//       'name' : name, 
//       'username': username,
//       'password' : password, 
//       'email' : email,
//     };

//     var response = await http.post(
//       Uri.parse(url + 'register'),
//       body: data,
//     );

//     if (response.statusCode == 201) {
//       isLoading.value = false;
//       debugPrint(json.decode(response.body));
      
//     }else{
//       isLoading.value = false;
//       debugPrint(json.decode(response.body));
//     }

//    } catch (e){
//     isLoading.value = false;
//     print(e.toString());
//    }

//  }


// Future registerUser({required String name, required String email, required String password, required String username, required String phone_number}) async {
//   var url = Uri.parse('http://192.168.153.1:81/api/register');
//   var response = await http.post(
//     url,
//     headers: {'Content-Type': 'application/json'},
//     body: jsonEncode({
//       'name': name,
//       'username': username,
//       'email': email,
//       'password': password,
//       'phone_number' : phone_number,
//     }),
//   );

//   if (response.statusCode == 200) {
//     // Registration successful
//     // var responseData = jsonDecode(response.body);
//     // var token = responseData['token'];

//     //return token;
//     debugPrint(json.decode(response.body));

//   } else {
//     // Registration failed
//     //var responseData = jsonDecode(response.body);
//     //var errorMessage = responseData['message'];
//     return response.body;
//   }

// }



Future<String?> registerUser({required String name, required String email, required String password, required String username, required String phone, required String type}) async {
  try{

      isLoading.value = true;
      var url = Uri.parse('http://192.168.153.1:81/api/register');
        var response = await http.post(
          url,
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
             },
          body: jsonEncode({
            'name': name,
            'username': username,
            'email': email,
            'password': password,
            'phone' : phone,
            'type' : type,
          }),
        );

         print('Response status code: ${response.statusCode}');
         print('Response body: ${response.body}');


        if (response.statusCode == 200) {
          isLoading.value = false;
          var responseData = jsonDecode(response.body);
          var token1 = responseData['token'];
          //var user = responseData['user'];
           token.value = token1;
          // userData.value = user;
           box.write("token", token.value);
          // GetStorage().write('user', user);
          // box.write("name", 'yohanes');

          //final user  = response1['user'] as Map<dynamic, dynamic>;
          //userData.value = user ;
           //GetStorage().write('user', user);

          //box.write('test', "this is test data");
          print(box.read('token'));
          print(box.read('user'));
          Get.offAll(() => const HomePage());
           Get.snackbar(
            'Success',
            responseData['message'],
            snackPosition: SnackPosition.TOP,
            backgroundColor: Colors.green,
            colorText: Colors.white,
          );
          return token1;
        } else {
          // isLoading.value = false;
          // var responseData = jsonDecode(response.body);
          //   Get.snackbar(
          //   'Error',
          //   'Registration Failed',
          //   snackPosition: SnackPosition.BOTTOM,
          //   backgroundColor: Colors.red,
          //   colorText: Colors.white,
          //);

          //print(jsonDecode(response.body));


      isLoading.value = false;
      //print(json.decode(response.body));
      var responseData = json.decode(response.body);
      
      Get.snackbar(
        'Error',
        responseData['message'],
        snackPosition: SnackPosition.TOP,
        backgroundColor: Colors.red,
        colorText: Colors.white,
      );

      }

        } catch (e){
          isLoading.value = false;
        // print(e.toString());
        }
        
      }


      Future<String?> loginUser( {required String email, required String password}) async {
        try{
            isLoading.value = true;
            var url = Uri.parse('http://192.168.153.1:81/api/login');
                  var response = await http.post(
                    url,
                    headers: {
                      'Content-Type': 'application/json',
                      'Accept': 'application/json',  
                    },
                    body: jsonEncode({
                      'email': email,
                      'password': password,
                    }),
                  );

                  print('Response status code: ${response.statusCode}');
                  print('Response body: ${response.body}');

                  if (response.statusCode == 200) {
                    isLoading.value = false;
                    var responseData = jsonDecode(response.body);
                    var token1 = responseData['token'];
                    var user = responseData['user'];
                    userData.value = user;
                    token.value = token1;

                    box.write("token", token.value);
                    box.write('user', userData.value);
                    Get.offAll(() => const HomePage());

                    Get.snackbar(
                      'Success',
                      responseData['message'],
                      snackPosition: SnackPosition.TOP,
                      backgroundColor: Colors.green,
                      colorText: Colors.white,
                    );
                    return token1;
                  } else {
                    isLoading.value = false;
                    var responseData = jsonDecode(response.body);
                    var errorMessage = responseData['message'];
                    Get.snackbar(
                    'Error',
                    errorMessage,
                    snackPosition: SnackPosition.TOP,
                    backgroundColor: Colors.red,
                    colorText: Colors.white,
                  );
                    return errorMessage;
                  }
        }catch(e){
          isLoading.value = false;
          // print(e.toString());
        }


      
      }


}