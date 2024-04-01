
import 'package:flutter/material.dart';
import 'package:furomapp/views/home.dart';
//import 'package:furomapp/constants/constants.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:get_storage/get_storage.dart';
import 'package:url_launcher/url_launcher.dart';
class PaymentController extends GetxController{

Future<String?> Pay({required List<dynamic> data}) async {
final box = GetStorage();
var userData = box.read('user');
final item = data[0];
//final userData = user[0];

 try{
            //isLoading.value = true;
            var url = Uri.parse('http://192.168.153.1:81/api/chappa');
                  var response = await http.post(
                    url,
                    headers: {
                      'Content-Type': 'application/json',
                      'Accept': 'application/json',  
                    },
                    body: jsonEncode({
                      'amount': item['price'],
                      'email':  userData['email'],
                      'first_name': userData['name'],
                      'last_name' : userData['lname'],
                      'phone': userData['phone'],
                    }),
                  );

                  print('Response status code: ${response.statusCode}');
                  print('Response body: ${response.body}');

                  if (response.statusCode == 200) {
                    var responseData = jsonDecode(response.body);
                    var url = responseData['data']['checkout_url'];
                   // var url = "https://chapa.co/";
                    
                    final websiteUrl = Uri.parse(url);

                   
                    launchUrl(
                      websiteUrl, 
                      mode: LaunchMode.inAppWebView
                    );
                    print(url);
                    // Get.offAll(() => const HomePage());

                    // Get.snackbar(
                    //   'Success',
                    //   responseData['message'],
                    //   snackPosition: SnackPosition.TOP,
                    //   backgroundColor: Colors.green,
                    //   colorText: Colors.white,
                    // );
                   
                  } else {
                  //  isLoading.value = false;
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
          //isLoading.value = false;
          // print(e.toString());
        }


      
      
}
  
}