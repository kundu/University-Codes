public class Vehicle 
{
	int x=0 , y=0 ;
	public void moveUp()
	{
		x=1;
		y=0;
	}
	public void moveDown()
	{
		x=-1;
		y=0;
	}
	public void moveRight()
	{
		x=0;
		y=0;
	}
	public void moveLeft()
	{
		x=-1;
		y=1;
	}
	public String toString() 
	{
		return "("+x+","+ y+")";
	}
}