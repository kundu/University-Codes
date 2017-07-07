public class Complex 
{
	double r,i;
	public Complex(double r , double i)
	{
		this.r=r;
		this.i=i;
	}
	public String toString()
	{
		return "The complex Number is \n"+(r*2)+"+"+"i"+(i*2);
	}
	public void polarRadius() 
	{
		double res=Math.pow(r, 2)+Math.pow(i, 2);
		res=Math.sqrt(res);
		System.out.println("The Polar Radius is \n"+res);
	}
}
