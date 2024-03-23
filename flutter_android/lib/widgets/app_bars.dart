import 'package:flutter/material.dart';
import '../config/config.dart';

class AppBars {
  signInAppBar(context) {
    return AppBar(
      leading: IconButton(
        icon: const Icon(Icons.arrow_back, color: Colors.white),
        onPressed: () => Navigator.of(context).pop(),
      ),
      title: const Text(
        titleSignInPage,
        style: TextStyle(color: Color.fromRGBO(0, 186, 120, 1)),
      ),
      backgroundColor: const Color.fromRGBO(39, 39, 39, 1),
    );
  }

  registrationAppBar(context) {
    return AppBar(
      leading: IconButton(
        icon: const Icon(Icons.arrow_back, color: Colors.white),
        onPressed: () => Navigator.of(context).pop(),
      ),
      title: const Text(
        titleRegistrationPage,
        style: TextStyle(color: Color.fromRGBO(0, 186, 120, 1)),
      ),
      backgroundColor: const Color.fromRGBO(39, 39, 39, 1),
    );
  }

  mainAppBar(context) {
    return AppBar(
        title: const Text(
          titleMainPage,
          style: TextStyle(color: Color.fromRGBO(0, 186, 120, 1)),
        ),
        backgroundColor: const Color.fromRGBO(39, 39, 39, 1),
        iconTheme: const IconThemeData(color: Colors.white));
  }
}
