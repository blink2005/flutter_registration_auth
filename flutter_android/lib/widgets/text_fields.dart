import 'package:flutter/material.dart';
import '../config/config.dart';

class TextFields {
  loginTextField({required controller}) {
    return Container(
      padding: const EdgeInsets.fromLTRB(40, 0, 40, 0),
      margin: const EdgeInsets.fromLTRB(0, 0, 0, 5),
      child: TextField(
        decoration: const InputDecoration(
            border: OutlineInputBorder(),
            hintText: hintTextLogin,
            hintStyle: TextStyle(color: Color.fromRGBO(148, 148, 148, 1)),
            focusedBorder: OutlineInputBorder(
                borderSide: BorderSide(color: Color.fromRGBO(41, 106, 76, 1)))),
        textAlign: TextAlign.center,
        controller: controller,
        style: const TextStyle(color: Colors.white),
      ),
    );
  }

  passwordTextField({required controller}) {
    return Container(
        padding: const EdgeInsets.fromLTRB(40, 0, 40, 0),
        margin: const EdgeInsets.fromLTRB(0, 5, 0, 0),
        child: TextField(
            obscureText: true,
            decoration: const InputDecoration(
                border: OutlineInputBorder(),
                hintText: hintTextPassword,
                hintStyle: TextStyle(color: Color.fromRGBO(148, 148, 148, 1)),
                focusedBorder: OutlineInputBorder(
                    borderSide:
                        BorderSide(color: Color.fromRGBO(41, 106, 76, 1)))),
            textAlign: TextAlign.center,
            controller: controller,
            style: const TextStyle(color: Colors.white)));
  }

  retryPasswordTextField({required controller}) {
    return Container(
        padding: const EdgeInsets.fromLTRB(40, 0, 40, 0),
        margin: const EdgeInsets.fromLTRB(0, 5, 0, 0),
        child: TextField(
            obscureText: true,
            decoration: const InputDecoration(
                border: OutlineInputBorder(),
                hintText: hintTextRetryPassword,
                hintStyle: TextStyle(color: Color.fromRGBO(148, 148, 148, 1)),
                focusedBorder: OutlineInputBorder(
                    borderSide:
                        BorderSide(color: Color.fromRGBO(41, 106, 76, 1)))),
            textAlign: TextAlign.center,
            controller: controller,
            style: const TextStyle(color: Colors.white)));
  }
}
