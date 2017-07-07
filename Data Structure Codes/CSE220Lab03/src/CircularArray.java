public class CircularArray{
  
  private int start;
  private int size;
  private Object [] cir;
  
  /*
   * if Object [] lin = {10, 20, 30, 40, null}
   * then, CircularArray(lin, 2, 4) will generate
   * Object [] cir = {40, null, 10, 20, 30}
   */
  public CircularArray(Object [] lin, int st, int sz){
      start=st;
      size=sz;
      cir=new Object[lin.length];
      
      int k=st+1;
      for(int c=0;c<lin.length;c++)
      {
    	  cir[c]=lin[k];
    	  k=(k+1)%lin.length;
      }
      
  }
  
  //Prints from index --> 0 to cir.length-1
  public void printFullLinear(){
	  
	  for(int c=0;c<cir.length;c++)
	  {
		  System.out.print(cir[c]+" ");
	  }
	  System.out.println();
  }
  
  // Starts Printing from index start. Prints a total of size elements
//This Should Print: 10, 20, 30, 40.
  public void printForward(){
	  System.out.println();
	  int k=start;
	  int nullPoint=0;
	  
	  for (int c=0; c<cir.length;c++)
	  {
		  if (cir[c]==null)
		  {
			  nullPoint=c;
		  }
	  }
	  k=nullPoint+1;
	  for(int c=0;c<cir.length-1;c++)
	  {
		  if (cir[k]!=null)
		  {
			  System.out.print(cir[k]+" ");
			  
		  }
		  k=(k+1)%cir.length;
	  }
  }
  
//This Should Print: 40, 30, 20, 10.
  public void printBackward(){
	  System.out.println();
	  int k=0;
	  int l=size;
	  int p=cir.length-1;
	  for(int c=0;c<size;c++)
	  {
		  System.out.print(cir[k]+" ");
		  k=p%cir.length;
		  p--;
	  }
  }
  
  // With no null cells
  public void linearize(){
    int n=0;
    int v=0;
    for (int c=0 ; c<cir.length;c++)
    {
    	if (cir[c]==null)
    	{
    		n=c;
    		v++;
    	}
    }
    int len=cir.length;
    Object tem[]=new Object[4];
    int l=v+1;
    v=v+1;;
    for (int c=0 ; c<size;c++)
    {
    	tem[c]=cir[v];
    	l++;
    	v=l%cir.length;
    }
    cir=tem;
  }
  
  // Do not change the Start index
  public void resizeStartUnchanged(int newcapacity){
	 
	  int k=start;
	  Object tem[]=new Object[cir.length];
      for(int c=0;c<cir.length;c++)
      {
    	  tem[c]=cir[k];
    	  k=(k+1)%cir.length;
      }

      cir=tem;
      Object tem2[]=new Object[newcapacity];
      int bro=0;
      for (int c=0;c<tem2.length;c++)
      {
    	  if (c>=2&&c<=6)
    	  {
    		  tem2[c]=cir[c-2];
    	  }
    	  else
    	  {
    		  tem2[c]=null;
    	  }
      }
      System.out.println();
     cir=tem2;
      
 }
  
  
  // Start index becomes zero
  public void resizeByLinearize(int newcapacity){
	  int k=start;
	  Object tem[]=new Object[cir.length];
      for(int c=0;c<cir.length;c++)
      {
    	  tem[c]=cir[k];
    	  k=(k+1)%cir.length;
      }

//      cir=tem;
      Object tem2[]=new Object[newcapacity];
      int bro=0;
      for (int c=0;c<tem2.length;c++)
      {
    	  if (c<tem.length)
    	  {
    		  tem2[c]=tem[c];
    	  }
    	  else
    	  {
    		  tem2[c]=null;
    	  }
      }
      System.out.println();
     cir=tem2;
  }
  
  /* pos --> position relative to start. Valid range of pos--> 0 to size.
   * Increase array length by 3 if size==cir.length
   * use resizeStartUnchanged() for resizing.
   */
  public void insertByRightShift(Object elem, int pos){
	  int k=start;
	  Object tem[]=new Object[cir.length];
      for(int c=0;c<cir.length;c++)
      {
    	  tem[c]=cir[k];
    	  k=(k+1)%cir.length;
      }
      cir=tem;
      tem=null;
      tem=new Object[8];
      int l=0;
      int v=0;
      for(int c=0;c<tem.length;c++)
	  {
		if (c>=pos)
		{
			if (v!=pos+2)
			{
				tem[v]=cir[l];
				l++;
				v++;
			}
			else
			{
				tem[v]=elem;
				v++;
			}
			
		}
		else
		{
			tem[v]=null;
			v++;
		}
	  }
      cir=tem;
  }
//This Should Print: null, 10, 20, 80, 90, 30, 40, 50.
  public void insertByLeftShift(Object elem, int pos){
	  int k=start;
	  Object tem[]=new Object[cir.length];
      for(int c=0;c<cir.length;c++)
      {
    	  tem[c]=cir[k];
    	  k=(k+1)%cir.length;
      }
      cir=tem;
      tem=null;
      tem=new Object[8];
      int l=0;
      int v=0;
      for(int c=0;c<tem.length;c++)
	  {
		if (c>=pos-1)
		{
			if (v!=pos+2)
			{
				tem[v]=cir[l];
				l++;
				v++;
			}
			else
			{
				tem[v]=elem;
				v++;
			}
			
		}
		else
		{
			tem[v]=null;
			v++;
		}
	  }
      cir=tem;
  }
  
  /* parameter--> pos. pos --> position relative to start.
   * Valid range of pos--> 0 to size-1
   */
  public void removeByLeftShift(int pos){
    int k=pos;
    Object tem[]=new Object[cir.length];
    for (int c = 0; c < tem.length; c++) 
    {
		if (c<pos) 
		{
			tem[c]=null;
		}
		else
		{
			k=c%(cir.length-1);
			tem[c]=cir[k];
		}
	}
    cir=tem;
    System.out.println();
  }
  
  /* parameter--> pos. pos --> position relative to start.
   * Valid range of pos--> 0 to size-1
   */
  public void removeByRightShift(int pos){
	  int k=pos;
	    Object tem[]=new Object[cir.length];
	    for (int c = 0; c < tem.length; c++) 
	    {
			if (c<pos) 
			{
				tem[c]=cir[c];
			}
			else
			{
				k=(c-1)%cir.length;
				tem[c]=cir[k];
			}
		}
	    cir=tem;
	    System.out.println();
  }
  
}