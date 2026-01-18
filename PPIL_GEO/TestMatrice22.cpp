using namespace std;

#include "Vecteur2D.h"
#include "Matrice22.h"

int main()
{
    Matrice22 mat(4, -1, 7, 3);
    Vecteur2D v1(2, 5);
    Vecteur2D v2;

    v2 = mat * v1;

    cout << "v1 = " << v1 << endl;
    cout << "mat = " << mat << endl;
    cout << "v3 = " << v2 << endl;

    const double PI = 3.1416;
    double alfa = PI / 4;

    Matrice R(alfa);

    return 0;
}