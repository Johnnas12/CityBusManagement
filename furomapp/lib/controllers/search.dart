import 'package:flutter/material.dart';
import 'package:furomapp/views/home.dart';
import 'package:furomapp/views/search_page.dart';
//import 'package:furomapp/constants/constants.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:get_storage/get_storage.dart';

class SearchResultController extends GetxController{
 final isLoading = false.obs;
      final token = ''.obs;
      final box = GetStorage();


  Future<String?> SearchResult({required String from, required String to}) async {
  try{
    

      isLoading.value = true;
      var url = Uri.parse('http://192.168.153.1:81/api/search');
        var response = await http.post(
          url,
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
             },
          body: jsonEncode({
            'source': from,
            'destination': to,
          }),
        );

         print('Response status code: ${response.statusCode}');
         print('Response body: ${response.body}');


        if (response.statusCode == 200) {
          isLoading.value = false;
          var responseData = jsonDecode(response.body);
          Get.offAll(() =>  SearchPageResult(data : responseData['data'] , source: from, destination: to));
           Get.snackbar(
            'Success',
            responseData['message'],
            snackPosition: SnackPosition.TOP,
            backgroundColor: Colors.green,
            colorText: Colors.white,
          );
         
        } else {
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
}