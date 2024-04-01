import 'package:flutter/material.dart';
import 'package:furomapp/views/register_page.dart';
import 'package:furomapp/controllers/authentication.dart';
import 'package:furomapp/views/widgets/input_widget.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:get/get.dart';
class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {

  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final AuthenticationController _authenticationController =Get.put(AuthenticationController());

  @override
  Widget build(BuildContext context) {
    var size = MediaQuery.of(context).size.width;
    return  Scaffold(
      body:
      SingleChildScrollView(
        child:  Center(
        child: Padding(
          padding: const EdgeInsets.symmetric(horizontal:0), //30.0
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [

              Container(
            decoration: BoxDecoration(
                boxShadow: [
                  BoxShadow(
                     color: Color.fromARGB(255, 1, 1, 1).withOpacity(0.2),
                      spreadRadius: 5,
                      blurRadius: 20,
                      offset: Offset(0, 6), 
                  )
                ],
                borderRadius: BorderRadius.only(
                  bottomLeft: Radius.circular(20.0),
                  bottomRight: Radius.circular(180.0),
                  
                ),
                color: Color(0xFFF36D44)),
            // color: Color(0xFFF36D44),
            height: 400,
            child: Padding(
              padding: const EdgeInsets.all(10.0),
              child: Column(

                children: [
                  SizedBox(height: 25,), 
                  ClipRRect(
                          borderRadius: BorderRadius.circular(60.0), // Adjust the radius as needed
                          child: Image.asset(
                            'assets/img/logo.jpg',
                            width: 200, // Adjust width as needed
                            height: 200, // Adjust height as needed
                            fit: BoxFit.cover,
                          ),
                        ), 
                  // Container(
                  //   decoration: BoxDecoration(
                  //     borderRadius: BorderRadius.circular(25),
                  //   ),
                  //   child: Image(
                  //   image: AssetImage(''),
                  //   height: 200,
                  // ),
                  // ), 
                   
                Text("Welcome To Anbessa City Bus ", style: GoogleFonts.poppins(fontSize: size * 0.070, color: Color(0xFFFFE606), fontWeight: FontWeight.w500)), 
                const SizedBox(height: 30,), 
                ],
              ),
            ), 
            ),
            SizedBox(height: 30,),
             Padding(
               padding: const EdgeInsets.symmetric(horizontal:30.0),
               child: Container(
                child: Column(
                  children: [
                  InputWidget(
                  hintText: "email", 
                  obsecureText: false,
                  controller: _emailController
                  ,), 
                const SizedBox(height: 30,), 
                InputWidget(
                  hintText: "Password",
                  obsecureText: true,
                  controller: _passwordController,
                ), 
                 const SizedBox(height: 30,), 
                  Obx( () {
                     return _authenticationController.isLoading.value
                     ? const CircularProgressIndicator()
                     : ElevatedButton(
                       
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color(0xFFF36D44),
                        elevation: 0, 
                        padding: const EdgeInsets.symmetric(horizontal: 50, vertical: 15)
                      ),
                      onPressed:() async {
                            await _authenticationController.loginUser(
                              email: _emailController.text.trim(), 
                              password: _passwordController.text.trim());
                      },
                      child: const Text("Log In", style: TextStyle(
                        color: Colors.white
                      ),) );
                    }
                  ), 
               
                  const SizedBox(height: 20,), 
                  Text("wanna try our services", style: GoogleFonts.poppins(fontSize: size * 0.040)), 
                  TextButton(onPressed: (){ Get.to(()=> const RegisterPage());}, child: Text(
                    "Here you are", style: GoogleFonts.poppins(fontSize: size * 0.030)
                  )), 
                  ],
                ),
               ),
             )
              
            ],
          ),
        ),
      ),
        
      )
      
    );
  }
}
