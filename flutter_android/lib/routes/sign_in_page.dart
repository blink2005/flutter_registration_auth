import 'package:flutter/material.dart';
import '../widgets/images.dart';
import '../widgets/text_fields.dart';
import '../widgets/buttons.dart';
import '../widgets/app_bars.dart';

class SignInPage extends StatelessWidget {
  var loginController = TextEditingController();
  var passwordController = TextEditingController();

  SignInPage({super.key});

  @override
  Widget build(BuildContext context) {
    Images images = Images();
    TextFields textFields = TextFields();
    Buttons buttons = Buttons();
    AppBars appBars = AppBars();

    return MaterialApp(
        home: Scaffold(
            resizeToAvoidBottomInset: false,
            appBar: appBars.signInAppBar(context),
            backgroundColor: const Color.fromRGBO(48, 48, 48, 1),
            body: SingleChildScrollView(
                child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                images.signInLogoImage(),
                textFields.loginTextField(controller: loginController),
                textFields.passwordTextField(controller: passwordController),
                buttons.signInButton(
                    widthScreen: MediaQuery.of(context).size.width,
                    passwordController: passwordController,
                    loginController: loginController,
                    context: context)
              ],
            ))));
  }
}
