/*
 *
 *
 * TCP client for the "uppercase server".
 *
 *
 */

#include <winsock2.h>
#include <iostream>
#include <sstream>
#include <string>
#include <cstring>
#include <cctype>
#include "error.h"

#pragma comment(lib, "ws2_32.lib")

using namespace std;

#define L 1024   // safer buffer size

int main()
{
    SetConsoleOutputCP(CP_UTF8);
    try
    {
        // -------------------- INITIALIZE WINSOCK --------------------
        WSADATA wsaData; //struct specific to winsock
        if (WSAStartup(MAKEWORD(2, 0), &wsaData) != 0)
            throw Erreur("WSAStartup failed");

        cout << "Client vers le serveur de majuscule\n";

        // -------------------- CREATE TCP SOCKET --------------------
        SOCKET sock = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP);
        if (sock == INVALID_SOCKET)
            throw Erreur("Socket creation failed");

        // -------------------- SERVER INFO --------------------
        char adresseServeur[L];
        short portServeur;

        cout << "Tapez l'adresse IP du serveur : ";
        cin >> adresseServeur;

        cout << "Tapez le port du serveur : ";
        cin >> portServeur;

        cin.ignore();

        SOCKADDR_IN serveur{};
        serveur.sin_family = AF_INET;
        serveur.sin_addr.s_addr = inet_addr(adresseServeur);
        serveur.sin_port = htons(portServeur);

        // -------------------- CONNECT --------------------
        if (connect(sock, (SOCKADDR*)&serveur, sizeof(serveur)) == SOCKET_ERROR)
            throw Erreur("Connexion au serveur échouée");

        cout << "Connexion réussie\n";

        // -------------------- MAIN LOOP --------------------
        while (true)
        {
            string requete;

            cout << "Tapez la chaîne à mettre en majuscule ou \"quitter\" : ";
            getline(cin, requete);   // READ FULL LINE (spaces included)

            if (requete == "quitter")
                break;


            requete += '\n';

            // -------------------- SEND (handle partial sends) --------------------
            int totalSent = 0;
            while (totalSent < (int)requete.size())
            {
                int sent = send(sock,
                                requete.c_str() + totalSent,
                                requete.size() - totalSent,
                                0);

                if (sent <= 0)
                    throw Erreur("Erreur lors de l'envoi");

                totalSent += sent;
            }

            // -------------------- RECEIVE (stream-safe) --------------------
            string reponse;
            char buffer[L];

            while (true)
            {
                int r = recv(sock, buffer, sizeof(buffer), 0);
                if (r <= 0)
                    throw Erreur("Erreur lors de la réception");

                reponse.append(buffer, r);

                // Stop when newline received (end of message)
                if (reponse.find('\n') != string::npos)
                    break;
            }


                reponse.erase(reponse.find('\n'));

            cout << reponse << endl;
        }

        // -------------------- CLEAN SHUTDOWN --------------------
        shutdown(sock, SD_BOTH);
        closesocket(sock);
        WSACleanup();

        cout << "Arrêt normal du client\n";
    }
    catch (Erreur& e)
    {
        cerr << e << endl;
    }

    return 0;
}
