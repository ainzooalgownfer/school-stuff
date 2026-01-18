// Created by moham on 12/01/2026.
//
#include <winsock2.h>
#include <iostream>
#include <string>
#include <algorithm>

#pragma comment(lib, "ws2_32.lib")
using namespace std;

int main() {
    WSADATA wsaData;
    WSAStartup(MAKEWORD(2, 0), &wsaData);

    // 1. Create Listening Socket
    SOCKET listenSock = socket(AF_INET, SOCK_STREAM, 0);

    sockaddr_in serverAddr;
    serverAddr.sin_family = AF_INET;
    serverAddr.sin_addr.s_addr = INADDR_ANY; // Listen on all available interfaces
    serverAddr.sin_port = htons(8080);

    // 2. Bind and Listen
    bind(listenSock, (sockaddr*)&serverAddr, sizeof(serverAddr));
    listen(listenSock, 3);
    cout << "Server listening on port 8080..." << endl;

    // 3. Accept a client connection
    SOCKET clientSock = accept(listenSock, NULL, NULL);
    cout << "Client connected!" << endl;

    char buffer[1024];

    while (true) {
        int bytesReceived = recv(clientSock, buffer, sizeof(buffer), 0);

        if (bytesReceived == 0) {
            std::cout << "Client disconnected\n";
            break;
        }
        if (bytesReceived < 0) {
            std::cout << "recv failed: " << WSAGetLastError() << "\n";
            break;
        }

        std::string data(buffer, bytesReceived);

        std::transform(data.begin(), data.end(), data.begin(),
            [](unsigned char c) { return std::toupper(c); });

        int totalSent = 0;
        while (totalSent < data.size()) {
            int sent = send(clientSock,
                            data.c_str() + totalSent,
                            data.size() - totalSent,
                            0);
            if (sent <= 0) break;
            totalSent += sent;
        }
    }


    closesocket(clientSock);
    closesocket(listenSock);
    WSACleanup();
    return 0;
}//
