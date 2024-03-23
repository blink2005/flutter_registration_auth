import 'package:flutter/material.dart';
import 'routes/sign_in_page.dart';
import 'routes/main_page.dart';
import 'routes/registration_page.dart';

void main() {
  runApp(const StartApp());
}

class StartApp extends StatelessWidget {
  const StartApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      initialRoute: '/',
      routes: {
        '/': (BuildContext context) => MainPage(),
        '/login': (BuildContext context) => SignInPage(),
        '/registration': (BuildContext context) => RegistrationPage(),
      },
    );
  }
}
