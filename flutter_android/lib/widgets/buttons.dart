import 'package:flutter/material.dart';
import '../config/config.dart';
import '../api_requests/requests.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class Buttons {
  Requests requests = Requests();

  Widget signInButton(
      {required widthScreen,
      required loginController,
      required passwordController,
      required context}) {
    return Container(
        padding: const EdgeInsets.fromLTRB(40, 0, 40, 0),
        width: widthScreen,
        margin: const EdgeInsets.fromLTRB(0, 10, 0, 0),
        child: ElevatedButton(
            onPressed: () {
              http
                  .get(Uri.parse(
                      '$authUrl?login=${loginController.text}&password=${passwordController.text}'))
                  .then((response) {
                final body = json.decode(response.body);
                showDialog(
                    context: context,
                    builder: (context) => AlertDialog(
                          actions: [
                            TextButton(
                                onPressed: () {
                                  Navigator.pop(context);
                                },
                                child: const Text('close'))
                          ],
                          title: const Text(alertDialogTitle),
                          content: Text(body['message']),
                          contentPadding: const EdgeInsets.all(20),
                        ));
              });
            },
            style: ElevatedButton.styleFrom(
                backgroundColor: const Color.fromRGBO(0, 186, 120, 1)),
            child: const Text(signInButtonText,
                style: TextStyle(color: Colors.white))));
  }

  registrationButton(
      {required widthScreen,
      required loginController,
      required passwordController,
      required retryPasswordController,
      required context}) {
    return Container(
        padding: const EdgeInsets.fromLTRB(40, 0, 40, 0),
        width: widthScreen,
        margin: const EdgeInsets.fromLTRB(0, 10, 0, 0),
        child: ElevatedButton(
            onPressed: () {
              http
                  .get(Uri.parse(
                      '$registrationUrl?login=${loginController.text}&password=${passwordController.text}&retryPassword=${retryPasswordController.text}'))
                  .then((response) {
                final body = json.decode(response.body);
                showDialog(
                    context: context,
                    builder: (context) => AlertDialog(
                          actions: [
                            TextButton(
                                onPressed: () {
                                  Navigator.pop(context);
                                },
                                child: const Text('close'))
                          ],
                          title: const Text(alertDialogTitle),
                          content: Text(body['message']),
                          contentPadding: const EdgeInsets.all(20),
                        ));
              });
            },
            style: ElevatedButton.styleFrom(
                backgroundColor: const Color.fromRGBO(0, 186, 120, 1)),
            child: const Text(registrationButtonText,
                style: TextStyle(color: Colors.white))));
  }
}
