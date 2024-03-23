import 'package:dio/dio.dart';

class Requests {
  getHttp() async {
    final dio = Dio();
    final response = await dio.get('http://192.168.1.78:8080');
    return response.data;
  }
}