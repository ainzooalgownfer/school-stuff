#include <Vecteur2D.h>
#include <iostream>
#include <string>
#include <sstream>

using namespace std;

int main()
{
    Vecteur2D A(2, 3), B(5), C;
    int a = 5;
    cout << "a = " << a << endl;
    cout << "A = " << (string)A << endl;
    cout << "A = " << A.operator string() << endl;
    cout << "A = " << A << endl;
    (((cout << "A = ") << A) << endl);
    // A = 7;
    cout << "A = " << A << endl;

    {
        Vecteur2D A(2, 3), B;
        Vecteur2D u(5, -1);

        B = A + u;

        Vecteur2D c(1, 7);

        C = A + u;
        cout << "A = " << A << endl;
        cout << "u = " << u << endl;
        cout << "B = " << B << endl;
    }

    {
        Vecteur2D v1(2, 3), v2(6, -1), u;

        u = v2 - v1;

        cout << "v1 = " << v1 << endl;
        cout << "v2 = " << v2 << endl;
        cout << "u = " << u << endl;
    }

    {
        int a, b, c;

        a = 5;
        b = 8;
        a += b;
        cout << "a = " << a << endl;
        cout << "b = " << b << endl;
        c = a += b;
        cout << "a = " << a << endl;
        cout << "b = " << b << endl;
        cout << "c = " << c << endl;

        Vecteur2D v1(3, 2), v2(-1, 4), v3;

        v1 += v2;

        v3 = v1 += v2;

        cout << "v1 = " << v1 << endl;
        cout << "v2 = " << v2 << endl;
        cout << "v3 = " << v3 << endl;
    }

    {
        cout << "produit Vecteur x double " << endl;

        Vecteur2D v1(-1, 4), v2;
        double a = 3;

        v2 = v1 * a;

        Vecteur2D v3;
        v3 = a * v1;

        cout << "v1 = " << v1 << endl;
        cout << "v2 = " << v2 << endl;
        cout << "v3 = " << v3 << endl;
    }

    {
        cout << "test du produit scalaire " << endl;
        Vecteur2D v1(3, 2), v2(-2, 3);

        v1 = 5 * v1;
        v2 = 3 * v2;

        double a = v1 * v2; // a = v1.operator*(v2);

        cout << "on doit obtenir 0, a = " << a << endl;
    }

    {
        cout << "Test de la norme d'un vecteur" << endl;

        Vecteur2D v(4, 3);

        double nV2 = v.norme2();
        cout << "On doit trouver 25, |v|^2 = " << nV2 << endl;

        double nV = v.norme2();
        cout << "On doit trouver 5, |v| = " << nV << endl;
    }

    return 0;
}
