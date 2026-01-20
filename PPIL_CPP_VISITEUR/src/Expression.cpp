#include "Expression.h"



ostream & operator << ( ostream & os, const Expression * expression)
{
    return os << (string)(*expression);
}