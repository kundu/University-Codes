import java.util.*;
public class amni
{
    public static void main (String [] args)
    {
        Scanner k=new Scanner (System.in);
        int n=k.nextInt();
        int d=0;
        double s=n;
        for (d=0;n>10;d++)
        {
            n=n/10;
        }
  
        double r=s;
        for (;d>-1;)
        {
            
            s=r/Math.pow(10,d);
            r=r%Math.pow(10,d);
            
            System.out.println((int)s);
            d--;
        }
        
    }
}