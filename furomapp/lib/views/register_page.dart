import 'dart:ffi';
import 'package:flutter/material.dart';
import 'package:furomapp/controllers/authentication.dart';
import 'package:furomapp/views/login_page.dart';
import 'package:furomapp/views/widgets/input_widget.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:get/get.dart';

class RegisterPage extends StatefulWidget {
  const RegisterPage({super.key});

  @override
  State<RegisterPage> createState() => _RegisterPageState();
}

class _RegisterPageState extends State<RegisterPage> {

  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _phoneController = TextEditingController();
  final TextEditingController _usernameController = TextEditingController();
  final String _type = 'passenger';
  final AuthenticationController _authenticationController =Get.put(AuthenticationController()); 

  @override
  Widget build(BuildContext context) {
    var size = MediaQuery.of(context).size.width;
    return  Scaffold(
      body: Center(
        child: Padding(
          padding: const EdgeInsets.symmetric(horizontal:30.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text("Register Page", style: GoogleFonts.poppins(fontSize: size * 0.070)), 
               const SizedBox(height: 20,), 
              InputWidget(
                hintText: "name", 
                obsecureText: false,
                controller: _nameController
                ,), 
               const SizedBox(height: 20,), 
              InputWidget(
                hintText: "username", 
                obsecureText: false,
                controller: _usernameController
                ,), 
              const SizedBox(height: 20,), 
              InputWidget(
                hintText: "email", 
                obsecureText: false,
                controller: _emailController
                ,), 
              const SizedBox(height: 20,), 
               InputWidget(
                hintText: "phone Number", 
                obsecureText: false,
                controller: _phoneController
                ,), 
              const SizedBox(height: 20,),
              InputWidget(
                hintText: "Password",
                obsecureText: true,
                controller: _passwordController,
              ), 
               const SizedBox(height: 20,), 
               Obx(() {
                   return _authenticationController.isLoading.value
                   ? const CircularProgressIndicator()
                   :ElevatedButton(    
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.black,
                      elevation: 0, 
                      padding: const EdgeInsets.symmetric(horizontal: 50, vertical: 15)
                    )        
                 ,
                    onPressed: () async{
                      await _authenticationController.registerUser(
                        name : _nameController.text.trim(), 
                        password: _passwordController.text.trim(), 
                        email: _emailController.text.trim(), 
                        username: _usernameController.text.trim(), 
                        phone: _phoneController.text.trim(),
                        type : _type.trim()
                        );
                    },
                    child: const Text("Register", style: TextStyle(
                      color: Colors.white
                    ),) );
                 }
               ),
          
               const SizedBox(height: 20,), 

                TextButton(onPressed: (){ Get.to(()=> const LoginPage());}, child: Text(
                  "back to Login", style: GoogleFonts.poppins(fontSize: size * 0.040)
                )), 
            ],
          ),
        ),
      ),
    );
  }
}
